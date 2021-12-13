<template>
<section>

        <div class="size">
        <h1>{{user.business_name}}</h1>
        <h4>{{user.address}} {{user.street_number}}</h4>
        <p>{{user.description}}</p>
        <h4>Il nostro menù</h4>
        <ul>
            <li v-for="(plate,index) in user.plates" :key="index">
                {{plate.plate_name}} {{plate.price}}€
            </li>
        </ul>
    </div>

    <div class="plates" id="plates">
					
					<div class="plate" v-for="(plate, index) in user.plates" :key="index+'first'">
						<!-- <img :src="'public/storage/'. plate.url_photo" :alt="plate.name"> -->
						<h3>{{plate.plate_name}}</h3>
						<div class="price">Prezzo: {{plate.price}} €</div>
						<button class="btn add-cart" @click="addToCart(plate), getTotalPrice()">Aggiungi al carrello</button>
					</div>

				</div>
            <div class="cart">
                <h2>Carrello</h2>
                <ul class="cart-basket" id="cart-basket">
                    <li v-for="(plate, index) in cart" :key="index">
                        <template>
							<h4>{{plate.plate_name}}</h4>
                        	<div>{{plate.price}} €</div>			
							<div class="input-group">
								<input type="button" value="-" class="button-minus" data-field="quantity" @click="plate.quantity--" v-if="plate.quantity > 1">
								<input type="number" step="1" max="" :value="plate.quantity" name="quantity" class="quantity-field" v-if="plate.quantity > 1">
								<input type="button" value="+" class="button-plus" data-field="quantity" @click="plate.quantity++" v-if="plate.quantity > 1">
							</div>
                        	<button class="btn cart-remove" @click="removeToCart(plate.id)">Rimuovi</button>
						</template>
                    </li>
                </ul>
                <div class="total"><strong>Totale:</strong> <span id="total-price">€{{getTotalPrice()}}</span></div>
			</div>

</section>


</template>

<script>
export default {
    name: 'SingleUser',
    data() {
        return {
            user: null,
		    cart: []
        }
    },

	
    mounted() {
        axios.get(`/api/users/${this.$route.params.slug}`)
        .then((response) => {
            console.log(response);
            this.user = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        })
		if(localStorage.cart){
			this.cart = JSON.parse(localStorage.cart);
		}
    },
	watch:{
		
		cart:{
			handler(newCart){
			localStorage.cart = JSON.stringify(newCart);
		},
		deep: true
		}
	},
	methods: {

		addToCart: function(plate) {

			if (!this.cart.includes(plate)){
				
				plate.quantity = 1;
				
				this.cart.push(plate);
			
				
			} else {
				this.cart.forEach(product => {
					if (product == plate){
						product.quantity++;
					}		
				});
				
			}
			console.log(this.cart);

			
			// if (!this.cart.includes(plate)){
			// 	this.cart.push(plate);
			// 	let product ={
			// 		cartPlate : plate,
			// 		quantity : 1
			// 	}
			// 	this.cart.push(product);
			// 	console.log(this.cart);
			// } else {
			// 	this.cart.forEach(product => {
			// 		if (product.cartPlate == plate){
			// 			product.quantity++;
			// 		}		
			// 	});
			// }

		},
		removeToCart: function(id) {
			// this.cart = this.cart.filter(
			// 	(elm) => {
			// 		if ( elm.id != id ) {
			// 			return true;
			// 		}
			// 		return false;
			// 	}
			// );
			let plate;
			
			this.cart.forEach(element => {
				if (element.id == id) {
					plate = element;
				}
			});

			if (plate.quantity > 1) {
				plate.quantity--;
			} else {
				this.cart = this.cart.filter(
					(elm) => {
						if ( elm.id != id ) {
							return true;
						}
						return false;
					});
			}
		},
		getTotalPrice: function() {
			let tot = 0
			this.cart.forEach(
				(elm) => {
					
					tot += elm.price * elm.quantity
				}
			);
	
			return tot;
		}
	}
}
</script>

<style lang="scss" scoped>

.size {
    min-height: 80vh;
    color: #440063;
    padding-left: 50px;
}



section {
    display: flex;
	margin-top: 100px;
}


.plates {
	width: 70%;
	padding: 40px 20px;
	display: flex;
	flex-wrap: wrap;
}
.cart {
	width: 30%;
	height: 100%;
	right: 0;
	padding: 40px 20px;
	text-align: center;
	background-color: #D0EB99;
}

.plate {
	width: calc(100% / 4 - 20px);
	margin: 10px;
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

   
</style>