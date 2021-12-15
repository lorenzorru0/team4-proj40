<template>
<section>

	<div class="left">
		<div class="row">
			<div v-if="user" class="size col-2">
				<h1>{{user.business_name}}</h1>
				<h4>{{user.address}} {{user.street_number}}</h4>
				<p>{{user.description}}</p>
			</div>

			<div class="plates col-10" id="plates">
				<div class="row row-cols-2">
					<div class="plate col" v-for="(plate, index) in plates" :key="index+'first'" v-show="plate.visible">
						<div v-if="plate.url_photo">
							<img :src="require(`../../../public/storage/${plate.url_photo}`)" :alt="plate.name">
						</div>
						<h3>{{plate.plate_name}}</h3>
						<div class="price">Prezzo: {{plate.price}} €</div>
						<button class="btn add-cart" @click="addToCart(plate), getTotalPrice(), cartOpen = true">Aggiungi al carrello</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="right justify-content-end">
		<button class="btn btn-primary " @click="cartOpen = !cartOpen"><i class="fas fa-shopping-cart"></i> {{cart.cart.length}} </button>
		<transition name="sideCart">
			
				<div v-if="cartOpen && cart.length != 0" class="cart">
					<h2>Carrello</h2>
					<ul class="cart-basket" id="cart-basket">
						<li v-for="(plate, index) in cart.cart" :key="index">
							<template class="row">
								<div class="col-4">
									<h4>{{plate.plate_name}} {{plate.price}} €</h4>
								</div>
								<div class="col-4">
									<div class="input-group justify-content-center">
										<input min="1" max="10" :placeholder='qty[plate.id]' type="number" step="1" v-model.number="qty.qty[plate.id]" name="quantity" class="quantity-field">
									</div>
								</div>
								<div class="col-4">
									<button class="btn cart-remove" @click="removeToCart(plate.id)">Rimuovi</button>
								</div>
							</template>
						</li>
					</ul>
					<div class="total">
						<strong>Totale:</strong> <span id="total-price">€{{getTotalPrice()}}</span> 

						<form action="/checkout">
							<button class="btn btn-primary">Checkout</button>
						</form>	
						<button class="btn btn-danger" @click="cart.cart = [], qty.qty = []">Svuota Carrello</button>
					</div>
				</div>
		</transition>
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
						presence = 1;
						console.log('Presente');
					}
				});
				if (presence == 0) {
					this.qty.qty[plate.id] = 1;
					this.cart.cart.push(plate);
				} 
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
		}
	}
}
</script>

<style lang="scss" scoped>

.size {
    padding-left: 50px;
}

section {
    display: flex;
	margin: 100px 0;
}

.left{
	display:flex;
	width: 70%;

	.row {
		width: 100%;
	}
}

.right{
	display: flex;
	align-items: flex-start;
}


.plates {

	.row {
		width: 100%;

		.plate {
			padding: 10px 0;
		}
	}
}

.plate img {
	width: 100%;
}
.plate .price {
	margin-bottom: 10px;
}
.btn.add-cart {
	background-color: #00CCBC;
	margin: auto;
}

.cart-basket {
	margin-top: 40px;
}
.cart-basket li {
	list-style: none;
	display: flex;
	justify-content: space-between;
	border-bottom: 1px solid #999;
	padding: 10px;
}

.cart .total {
	margin-top: 80px;
}

.cart-remove {
	background-color: #00CCBC;
}

// input,
// textarea {
//   border: 1px solid #eeeeee;
//   box-sizing: border-box;
//   margin: 0;
//   outline: none;
//   padding: 10px;
// }

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
// input::-webkit-outer-spin-button,
// input::-webkit-inner-spin-button {
//   -webkit-appearance: none;
// }

// .input-group {
//   clear: both;
//   margin: 15px 0;
//   position: relative;
// }

// .input-group input[type='button'] {
//   background-color: #eeeeee;
//   min-width: 38px;
//   width: auto;
//   transition: all 300ms ease;
// }

// .input-group .button-minus,
// .input-group .button-plus {
//   font-weight: bold;
//   height: 38px;
//   padding: 0;
//   width: 38px;
//   position: relative;
// }

// .input-group .quantity-field {
//   position: relative;
//   height: 38px;
//   left: -6px;
//   text-align: center;
//   width: 62px;
//   display: inline-block;
//   font-size: 13px;
//   margin: 0 0 5px;
//   resize: vertical;
// }

// .button-plus {
//   left: -13px;
// }

// input[type="number"] {
//   -moz-appearance: textfield;
//   -webkit-appearance: none;
// }

 // CART-OPEN

	.cart {
		padding: 40px 20px;
		text-align: center;
		width: 31.25rem;
		background-color: rgba($color: #D0EB99, $alpha: .8);
		position: absolute;
		right: 0;
		z-index: 50;
		border-radius: 10px;
	}
    
    // MENU-TRANSITION
    .sideCart{
        &-enter, &-leave-to {
            opacity: 0;
            transform: translateX(60px);
        }
        &-enter-active, &-leave-active{
            transition: all 500ms;
        }

    }

    .types{
        &-enter {
            opacity: 0;
            transform: translateX(60px);
        }
        &-enter-active{
            transition: all 500ms ease-in-out;
        }
    }

   
</style>