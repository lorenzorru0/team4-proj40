<template>
<div>
    <div class="about">
       <h2 class="text-uppercase font-weight-bold">Deliveboo è una piattaforma che accontenta ogni tua richiesta</h2> 
    </div>
    <h3 class="about">i nostri Partner</h3>

    <div class="about view text-uppercase text-center">
        <ul class="view">
            <li class="view">
                <img src="images/uno.png" alt="Imachai">
            </li>
            <li class="view">
                <img src="images/quattro.png" alt="Lievita">
            </li>
            <li class="view">
                <img src="images/tre.png" alt="Femakinho">
            </li>
            <li class="view">
                <img src="images/cinque.png" alt="Starbene">
            </li>
            <li class="view">
                <img src="images/due.png" alt="Daruma">
            </li>
        </ul>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="left-section col-6" >
                    <h1 class="unaRealta">una realtà consolidata con l'esperienza</h1>
                    <h6 class="unaRealta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente aspernatur nesciunt excepturi earum cum saepe voluptas magni mollitia, 
                        impedit dolor consectetur tenetur odio quaerat temporibus voluptates! Molestiae ipsa numquam cupiditate?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae at suscipit eius saepe officia voluptatibus corrupti laudantium dicta sit culpa ex aliquam,
                        hic totam, debitis laborum delectus. Fugit, voluptate expedita.</h6>
                         <h6 class="unaRealta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente aspernatur nesciunt excepturi earum cum saepe voluptas magni mollitia, 
                        impedit dolor consectetur tenetur odio quaerat temporibus voluptates! Molestiae ipsa numquam cupiditate?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae at suscipit eius saepe officia voluptatibus corrupti laudantium dicta sit culpa ex aliquam,
                        hic totam, debitis laborum delectus. Fugit, voluptate expedita.</h6>
                        <h6 class="unaRealta">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente aspernatur nesciunt excepturi earum cum saepe voluptas magni mollitia, 
                        impedit dolor consectetur tenetur odio quaerat temporibus voluptates! Molestiae ipsa numquam cupiditate?
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae at suscipit eius saepe officia voluptatibus corrupti laudantium dicta sit culpa ex aliquam,
                        hic totam, debitis laborum delectus. Fugit, voluptate expedita.</h6>
                </div>
                <div class="right-section col-6" >
                    <div class="imgAbout">
                        <img class="imgAbout" src="images/bkg_tre.jpg" alt="">
                        <img class="imgAbout" src="images/restaurants.jpg" alt="">
                       
                    </div>
                </div>
                
                <div>
                    <img class="imageProva" src="images/pricing_home - Copia.svg" alt="">
                </div>
                
            </div>
        </div>
    </section>

</div>
    
</template>

<script>


export default {
    name: 'About'
}
</script>

<style lang="scss" scoped>
.about {
    display: flex;
    align-items: center;
    justify-content: space-around;
    padding-top: 100px;
}

.view{
   padding: 30px;
   background: #ffffff00;
   color: rgb(70, 70, 70);
   display: flex;
   align-items: center;
}

ul li {
    display: inline-flex;
    list-style: none;
    max-width: 100%;
    padding-right: 70px;
}

.unaRealta{
    padding: 30px;
    margin-top: 40px;
}

.imgAbout {
    width: 100%;
    padding-top: 40px;
    padding-bottom: 40px;
}

.logo {
    width: 70%;
    padding-left: 170px;
    padding-top: 50px;
}

.imageProva {
    width: 170%;
    margin-left: 40px;
}

</style>