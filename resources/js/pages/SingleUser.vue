<template>
<section class="container-fluid">
	<div class="row">
		<div class="col-sm-12 col-md-8 flex-column justify-content-center">
			<div v-if="user" class="col">
				<h1>{{user.business_name}}</h1>
				<h5>{{user.address}} {{user.street_number}}</h5>
				<p>{{user.description}}</p>
			</div>

			<div class="row row-cols-1 row-cols-sm-1 row-cols-lg-2">
					<div class="plate col" v-for="(plate, index) in plates" :key="index+'first'" v-show="plate.visible">
						<div class="plate-container d-flex mt-5">
							<div v-if="plate.url_photo" class="plate-image">
								<img :src="require(`../../../public/storage/${plate.url_photo}`)" :alt="plate.name">
							</div>
								
							<div>
								<h3>{{plate.plate_name}}</h3>
								<div class="price">Prezzo: {{plate.price}}€</div>
								<div>Descrizione: {{plate.description}}</div>
								<button class="btn add-cart mt-3" @click="addToCart(plate), getTotalPrice(), cartOpen = true">Aggiungi al carrello</button>
							</div>
						</div>
					</div>
				</div>	
			</div>
		
		<div class="col-sm-12 col-md-4">	
			<div>
				<i class="fas fa-shopping-cart"></i> {{cart.cart.length}}
			</div>
			<div class="cart" v-if="cart.cart.length > 0" data-aos="fade-left" data-aos-duration="1000">
				<h2>Carrello</h2>
				<ul class="cart-basket" id="cart-basket">
					<li v-for="(plate, index) in cart.cart" :key="index">
						<template class="row">
							<div class="col-4">
								<h4>{{plate.plate_name}}<h4>
								</h4>{{plate.price}}€</h4>
							</div>
							<div class="col-4">
								<div class="input-group d-flex justify-content-around">
									<div class="event" @click="cartMinus(plate.id)"><i class="fas fa-minus"></i></div>
									<input disabled min="1" max="10" type="number" step="1" v-model="qty.qty[plate.id]" name="quantity" class="quantity-field qty">
									<div class="event" @click="cartPlus(plate.id)"><i class="fas fa-plus"></i></div>
								</div>
							</div>
							<div class="col-4">
								<button class="btn cart-remove" @click="removeToCart(plate.id)">Rimuovi</button>
							</div>
						</template>
					</li>
				</ul>
				<div class="total">
					<div class="mb-2">
						<strong>Totale:</strong> <span id="total-price">{{getTotalPrice()}}€</span> 
					</div>
					<div>
						<button @click="sendInfo()" class="btn btn-primary">Checkout</button>
					</div>
					<button v-if="cart.cart.length > 0" class="btn btn-danger" @click="removeCart()">Svuota Carrello</button>
				</div>
			</div>
		</div>
	</div>
</section>

</template>

<script>
export default {
    name: 'SingleUser',
    data() {
        return {
            user: null,
			plates: null,
		    cart: {
				user: null,
				cart: []
			},
			qty: {
				user: null,
				qty: []
			},
			cartOpen: false
        }
    },
    created() {
        axios.get(`/api/users/${this.$route.params.slug}`)
        .then((response) => {
            this.user = response.data.data;
			this.plates = this.user.plates;
			this.cart.user = this.user.id;
			this.qty.user = this.user.id;

			if(localStorage[`cart-${this.user.id}`]) {
				let cartTest = JSON.parse(localStorage[`cart-${this.user.id}`]);
				let qtyTest = JSON.parse(localStorage[`qty-${this.user.id}`]);
				if (cartTest.user == this.user.id) {
					this.cart.cart = cartTest.cart;
					this.qty.qty = qtyTest.qty;
				}

				if (cartTest.cart.length > 0) {
					cartTest.cart.forEach(elm => {
						if (!this.qty.qty[elm.id]) {
							this.qty.qty[elm.id] = 1;
						}
					});
				}
			}
        })
        .catch((error) => {
            console.log(error);
        })
    },
	watch:{
		cart:{
			handler(newCart){
				localStorage[`cart-${this.user.id}`] = JSON.stringify(newCart);
			},
			deep: true
		},
		qty:{
			handler(quantity){
				localStorage[`qty-${this.user.id}`] = JSON.stringify(quantity);
			},
			deep: true
		}
	},
	methods: {
		addToCart: function(plate) {
			let testCart =  JSON.parse(localStorage[`cart-${this.user.id}`]);
			var presence = 0;

			if (!this.cart.cart.includes(plate)){
				testCart.cart.forEach(elm => {
					if (elm.id == plate.id) {
						this.qty.qty[plate.id] = 1;
						presence = 1;
					}
				});
				if (presence == 0) {
					this.qty.qty[plate.id] = 1;
					localStorage[`qty-${this.user.id}`] = JSON.stringify(this.qty);
					this.cart.cart.push(plate);
				} 
			} else {
				this.cartPlus(plate.id);
			}
		},
		removeToCart: function(id) {
			let plate;
			
			this.cart.cart.forEach(element => {
				if (element.id == id) {
					plate = element;
				}
			});

			this.cart.cart = this.cart.cart.filter(
				(elm) => {
					if ( elm.id != id ) {
						this.qty.qty[plate.id] = 1;
						return true;
					}
					return false;
				}
			);
		},
		getTotalPrice: function() {
			let tot = 0
			this.cart.cart.forEach(
				(elm) => {
					tot += elm.price * this.qty.qty[elm.id];
				}
			);
			return tot;
		},
		removeCart: function() {
			this.cart.cart = [];
			this.qty.qty = []; 
			localStorage[`qty-${this.user.id}`] = JSON.stringify(this.qty);
		},
		sendInfo: function() {
			let infoCart = this.cart.cart;

			if (infoCart.length > 0) {
				window.location.assign(`/checkout/${this.user.id}`);
			}
		},
		cartMinus: function(id) {
			if(this.qty.qty[id] >= 2) {
				this.qty.qty[id] = this.qty.qty[id] - 1;
				localStorage[`qty-${this.user.id}`] = JSON.stringify(this.qty);
				this.qty = JSON.parse(localStorage[`qty-${this.user.id}`]);
			}
		},
		cartPlus: function(id) {
			if(this.qty.qty[id] >= 1 && this.qty.qty[id] < 10) {
				this.qty.qty[id] = this.qty.qty[id] + 1;
				localStorage[`qty-${this.user.id}`] = JSON.stringify(this.qty);
				this.qty = JSON.parse(localStorage[`qty-${this.user.id}`]);
			}
		},
	}
}
</script>

<style lang="scss" scoped>

section {
    // display: flex;
	padding: 50px;
	// background-image: url('../../../public/images/texture.jpeg');
	// background-color: rgb(231, 212, 212);
	// & > .row {
	// 	width: 100%;
	// }
}

.btn.add-cart {
	background-color: #00CCBC;
	margin: auto;
	color: white;
}

.plate {
	margin: 15px 0;
}

.plate-image img{
	margin-right: 20px;
	width: 200px;
	height: 200px;
	object-fit: cover;
	border-radius: 10%;
}

.plate .price {
	margin-bottom: 10px;
	font-size: 15px;
}

i {
	color: #00CCBC;
	font-size: 20px;
}

.cart-basket {
	margin-top: 40px;
}
.cart-basket li {
	list-style: none;
	display: flex;
	justify-content: space-between;
	border-bottom: 1px solid #00CCBC;
	padding: 20px;
}

.cart .total {
	margin-top: 80px;
}

.cart-remove {
	background-color: #00CCBC;
	color: white;
}

.input-group {
	width: 100%;
	margin-left: 20px;
	.qty {
		border: none;
		font-size: 1.1rem;
		// padding: 15px;
		border-radius: 5px;
		text-align: center;
	}
}

.total > div {
	font-size: 1.1rem;
}

.btn.btn-primary {
	margin: 30px 0;
}

input[type="number"] {
	width: 50px;
	height: 25px;
}

input[type="button"] {
	width: 25px;
	height: 25px;
	cursor: pointer;
}

a {
	text-align: none;
	color: white;
}

 // CART-OPEN

	.cart {
		padding: 20px;
		text-align: center;
		// width: 31.25rem;
		// background-color: #c0e4e0;
		position: relative;
		// right: 0;
		// z-index: 50;
		border-radius: 10px;
		margin-left: 20px;
		border: 3px solid #00CCBC;
		ul {
			padding: 0px;
		}

		.event {
			cursor: pointer;
		}
	}
    
    // // MENU-TRANSITION
    // .sideCart{
    //     &-enter, &-leave-to {
    //         opacity: 0;
    //         transform: translateX(60px);
    //     }
    //     &-enter-active, &-leave-active{
    //         transition: all 500ms;
    //     }

    // }

    // .types{
    //     &-enter {
    //         opacity: 0;
    //         transform: translateX(60px);
    //     }
    //     &-enter-active{
    //         transition: all 500ms ease-in-out;
    //     }
    // }

</style>