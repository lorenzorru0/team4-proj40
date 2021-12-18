<template>
<div>
    <div class="about">
       <h1>Deliveboo è una piattaforma che colma ogni tua richiesta</h1> 
    </div>
    <h3 class="about">i nostri Partner</h3>

    <!-- <div class="mainSectionFour d-flex">
      <div class="sectionOneImgLeft">
      </div>
      <div class="sectionOneImgRight">
      </div>
    </div> -->

    <div class="about view text-uppercase text-center">
        <ul class="view">
            <li class="view">
                <img src="images/uno.png" alt="Rossopomodoro">
            </li>
            <li class="view">
                <img src="images/quattro.png" alt="La Piadineria">
            </li>
            <li class="view">
                <img src="images/tre.png" alt="La Piadineria">
            </li>
            <li class="view">
                <img src="images/cinque.png" alt="La Piadineria">
            </li>
            <li class="view">
                <img src="images/due.png" alt="lievita">
            </li>
        </ul>
    </div>
    <!-- <div class="left-section col-md-6">
        <img src="images/pasta.jpg" alt="prova">
    </div> -->

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
                </div>
                <div class="right-section col-6" >
                    <div class="pasta">
                        <img class="pasta" src="images/bkg_tre.jpg" alt="">
                        <!-- <img class="pasta" src="images/pasta.jpg" alt=""> -->
                        <img class="pasta" src="images/restaurants.jpg" alt="">
                    </div>
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
    padding: 40px;
}

.view{
   padding: 30px;
   background: #ffffff;
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

.pasta {
    width: 100%;
    padding-top: 40px;
    padding-bottom: 40px;
}

.logo {
    width: 70%;
    padding-left: 170px;
    padding-top: 50px;
}


// .sectionOneImgLeft {
//     background-image: url('/images/prova_uno.jpg');
//     background-position: right;
//     background-size: cover;
//     height: 500px;
//     width: 50%;
// }

// .sectionOneImgRight {
//    background-image: url('/images/prova_uno.jpg');
//     background-position: right;
//     background-size: cover;
//     height: 500px;
//     width: 50%;
// }

// .sectionTwoImgLeft {
//     background-image: url('/images/prova_uno.jpg');
//     background-position: right;
//     background-size: cover;
//     height: 500px;
//     width: 50%;
// }

// .sectionTwoImgRight {
//     background-image: url('/image/prova_uno.jpg');
//     background-position: right;
//     background-size: cover;
//     height: 500px;
//     width: 50%;
// }

// .sectionTreeImgLeft {
//     background-image: url('/images/prova_uno.jpg');
//     background-position: right;
//     background-size: cover;
//     height: 500px;
//     width: 50%;
// }

// .sectionTwoImgRight {
//     background-image: url('/image/prova_uno.jpg');
//     background-position: right;
//     background-size: cover;
//     height: 500px;
//     width: 50%;
// }

</style>