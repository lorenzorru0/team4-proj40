<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="left-section col-12 col-md-6">
                    <h1>I piatti che ami, a domicilio.</h1>
                    <h5 class="text-light">
                        Basta con i soliti piatti: da oggi ci pensa Deliveboo,
                        dal Ristorante alla tua tavola
                    </h5>
                </div>
                <div class="right-section col-12">
                    <div class="hero">
                        <img class="logo" src="http://localhost:3000/images/logo_white.png" alt="logoTipo Deliveboo">
                        <div class="to-your-home">#aCasaTuaConDeliveboo</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

export default {
    name: 'Hero'
}
</script>

<style lang="scss" scoped>
    section {
        height: 100%;
        display: flex;
        justify-content: space-between;
        // background: linear-gradient(172deg, #8bc64373 50%, #8bc64373 50%);
        background-repeat: no-repeat;
        background-image: url('/images/bkg_quattro.jpg');
        background-position: center;
        background-size: cover;
        height: 650px;
        -webkit-transition-duration: 3s; /* Safari & Chrome */
        transition-duration: 3s;
        // filter: brightness(50%);
        .left-section {
            h1 {
                color: white;
                // color: #440063;
                margin-top: .9375rem;
                font-size: 2.5rem;
                font-weight: 900;
                display: flex;
                align-items: center;
                margin-top: 50px;
            }
        }
        .right-section {
            .hero {
                max-width: 43.75rem;
                margin: auto 0;

                img {
                    width: 50%;
                    text-align: center;
                }
            }
            .to-your-home {
                max-width: 43.75rem;
                text-align: left;
                color: white;
                font-size: 1.5625rem;
                font-weight: 900;
                // background-color: #017E8A;
                padding-bottom: 20px;
            }
        }

        // &:hover {
        //     background-image: url('/images/bkg.jpg');
        //     background-position: center;
        //     background-size: cover;
        // }
    }

    .logo {
        padding: 40px;
    }

// .container:hover {
//     transition: 4s;
//     background-color: rgba(0,0,0,0.3);
//     background-image: url('/images/bkg.jpg');
//     background-position: center;
//     background-size: cover;
//     // max-width:1900px;
// }

</style>