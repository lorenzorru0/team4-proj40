<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="left-section col-12 col-md-6">
                    <h1>I piatti che ami, a domicilio.</h1>
                </div>

                <div class="right-section col-12 col-md-6">
                    <div class="hero">
                        <img src="https://sg.deliveroo.news/assets/images/blogs/sg.deliveroo.news/en/news/1uM9TDs_csvbmx7h7I7ZlfUjq-6qn0AC8T2hMgr9Wly0/h_pasted_image_0.jpg?v=1.01" alt="Hero Image">
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
        background: linear-gradient(172deg, #00CCBC 50%, #D0EB99 50%, #D0EB99 50%);
        .left-section {
            h1 {
                color: #440063;
                margin-top: .9375rem;
                font-size: 2.5rem;
                font-weight: 900;
            }
        }
        .right-section {
            .hero {
                max-width: 43.75rem;
                margin: auto 0;

                img {
                    width: 100%;
                    text-align: center;
                }
            }
            .to-your-home {
                max-width: 43.75rem;
                text-align: center;
                color: white;
                font-size: 1.5625rem;
                font-weight: 900;
                background-color: #017E8A;
            }
        }
        
        
    }
</style>