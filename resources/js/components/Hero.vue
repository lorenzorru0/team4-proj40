<template>
    <section>
        
        <div class="left-section">
            <h1>I piatti che ami, a domicilio.</h1>
        </div>

        <div class="right-section">
            <div class="hero">
                <img src="https://sg.deliveroo.news/assets/images/blogs/sg.deliveroo.news/en/news/1uM9TDs_csvbmx7h7I7ZlfUjq-6qn0AC8T2hMgr9Wly0/h_pasted_image_0.jpg?v=1.01" alt="Hero Image">
                <div class="to-your-home">#aCasaTuaConDeliveboo</div>
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
        height: 700px;
        display: flex;
        justify-content: space-around;
        background: rgb(3,201,241);
background: linear-gradient(172deg, #00CCBC 50%, #D0EB99 50%, #D0EB99 50%);
        .left-section {
            display: flex;
            flex-direction: column;
            h1 {
                color: #440063;
                margin: auto 0;
                font-size: 45px;
                font-weight: 900;
            }
        }
        .right-section {
            display: flex;
            flex-direction: column;
            .hero {
                max-width: 700px;
                margin: auto 0;

                img {
                    width: 100%;
                    text-align: center;
                }
            }
            .to-your-home {
                max-width: 700px;
                text-align: center;
                color: white;
                font-size: 40px;
                font-weight: 900;
                background-color: #017E8A;
            }
        }
        
        
    }
</style>