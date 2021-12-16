<template>
<section>
	<div class="row">
		<div class="left col-12 col-md-9">
			<div class="row">
				<div v-if="user" class="size col-12 col-md-2">
					<h1>{{user.business_name}}</h1>
					<h4>{{user.address}} {{user.street_number}}</h4>
					<p>{{user.description}}</p>
				</div>

				<div class="plates col-12 col-md-10" id="plates">
					<div class="row row-cols-1 row-cols-sm-2">
						<div class="plate col" v-for="(plate, index) in plates" :key="index+'first'" v-show="plate.visible">
							<div class="row">
								<div class="col-4" v-if="plate.url_photo">
									<img :src="require(`../../../public/storage/${plate.url_photo}`)" :alt="plate.name">
								</div>
								<div class="col-4 d-flex align-items-center">
									<div>
										<h3>{{plate.plate_name}}</h3>
										<div class="price">Prezzo: {{plate.price}} €</div>
									</div>
								</div>
								<div class="col-4 d-flex align-items-center">
									<button class="btn add-cart" @click="addToCart(plate), getTotalPrice(), cartOpen = true">Aggiungi al carrello</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="right col-12 col-md-3">
			<button class="btn btn-primary " @click="cartOpen = !cartOpen"><i class="fas fa-shopping-cart"></i> {{cart.cart.length}} </button>
			<transition name="sideCart">
				
					<div v-if="cartOpen && cart.length != 0" class="cart">
						<h2>Carrello</h2>
						<ul class="cart-basket" id="cart-basket">
							<li v-for="(plate, index) in cart.cart" :key="index">
								<template class="row">
									<div class="col-4 d-flex align-items-center">
										<h4>{{plate.plate_name}} {{plate.price}} €</h4>
									</div>
									<div class="col-4 d-flex align-items-center">
										<div class="input-group">
											<input min="1" max="10" :placeholder='qty[plate.id]' type="number" step="1" v-model.number="qty.qty[plate.id]" name="quantity" class="quantity-field qty">
										</div>
									</div>
									<div class="col-4 d-flex align-items-center">
										<button class="btn cart-remove" @click="removeToCart(plate.id)">Rimuovi</button>
									</div>
								</template>
							</li>
						</ul>
						<div class="total">
							<div class="mb-2">
								<strong>Totale:</strong> <span id="total-price">€{{getTotalPrice()}}</span> 
							</div>

							<!-- <form action="/checkout"> -->
								<button @click="sendInfo()" class="btn btn-primary">Checkout</button>
							<!-- </form>	 -->
							<button class="btn btn-danger" @click="cart.cart = [], qty.qty = []">Svuota Carrello</button>
						</div>
					</div>
			</transition>
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
		},
		sendInfo: function() {
			let info = {};
			info.cart = this.cart.cart;
			info.qty = this.qty.qty;
			info.user = this.user.id;

			if (info.cart.length > 0) {
	
				// info = JSON.stringify(info);
				// let data = {
				// 	cart: JSON.stringify(info)
				// }
	
				// axios.post(`api/order`, data);
	
				// axios({
				// 	method: 'post',
				// 	url: 'api/order',
				// 	data: data,
				// 	headers: {
				// 		'Content-Type': 'multipart/form-data',
				// 	},
				// }).then(function (response) {
				// 	console.log(response);
				// }).catch(function (error) {
				// 	console.log(error);
				// });
	
				window.location.assign('/checkout');
				console.log(data);
			}
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

	& > .row {
		width: 100%;
	}
}

.left{
	width: 100%;
	display:flex;

	h1 {
		text-transform: capitalize;
	}

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
			background-color: #F9FAFA;
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

.input-group {
	width: 100%;

	.qty {
		width: 100%;
		border: none;
		font-size: 1.1rem;
		padding: 15px;
		border-radius: 5px;
		text-align: center;
	}
}

.total > div {
	font-size: 1.1rem;
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