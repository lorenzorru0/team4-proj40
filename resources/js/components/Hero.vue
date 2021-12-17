<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="left-section col-12 col-md-6">
                    <h1>I piatti che ami, a domicilio.</h1>
                </div>
                <div class="right-section col-12 col-md-6">
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
        background-image: url('/images/bkg.jpg');
        background-size: cover;
        background-position: center;
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
    }

    .logo {
        padding: 40px;
    }

</style>