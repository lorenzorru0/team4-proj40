<template>
<div>
    <div class="about">
       <h2 class="text-uppercase font-weight-bold">Deliveboo è una piattaforma che accontenta ogni tua richiesta</h2> 
    </div>
    <h3 class="about">Fai visita ai nostri Partner</h3>

    <div class="about view text-uppercase text-center">
        <ul class="view">
            <li class="view">
                <a href="https://matcha.com/"><img class="a" src="images/uno.png" alt="Macha"></a>
            </li>
            <li class="view">
                <a href="https://lievital.it/"><img class="a" src="images/quattro.png" alt="Lievita"></a>
            </li>
            <li class="view">
                <a href="https://www.temakinho.com/"><img class="a" src="images/tre.png" alt="Temakinho"></a>
            </li>
            <li class="view">
                <a href="https://www.starbene.it/"><img class="a" src="images/cinque.png" alt="Starbene"></a>
            </li>
            <li class="view">
                <a href="https://www.darumasushi.com/"><img class="a" src="images/due.png" alt="Daruma"></a>
            </li>
        </ul>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="left-section col-6" >
                    <h1 class="unaRealta">Una realtà consolidata con l'esperienza</h1>
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
                    <div class="imgAbout cf">
                        <img class="imgAbout bottom" src="images/bkg_tre.jpg" alt="">
                        <img class="imgAbout top" src="images/restaurants.jpg" alt="">
                    </div>
                     <div class="imgAbout cf">
                        <img class="imgAbout bottom" src="images/bkg_tre.jpg" alt="">
                        <img class="imgAbout top" src="images/restaurants.jpg" alt="">
                    </div>
                    <div class="imgAbout cf">
                        <a href="/register"><button class="iscriviti  text-uppercase  font-weight-bold">Iscriviti</button></a>
                        <h4 class="pt-4 font-weight-bold">Centro iscrizione Deliveboo</h4>
                        <p class="pt-2">Hai una domanda, oppure hai bisogno di consigli o assistenza? <br>
                        Siamo qui per offrirti il nostro supporto in diversi modi.</p>
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

.a:hover {
    transform: translateY(-20px);
    transition: 1s;
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
    width: 200%;
    margin-left: 40px;
}

.iscriviti {
    color:rgb(255, 255, 255);
    background-color: #6dc96d;
    border: none;
    border-radius: 10px;
    padding: 10px;
    width: 120px;
    margin-top: 50px;
}

.iscriviti:hover {
    background: coral;
    transition: 1s;
}

.cf {
  position:relative;
  height:300px;
  width:450px;
  margin:0 auto;
}

.cf img {
  position:absolute;
  left:0;
  -webkit-transition: opacity 1s ease-in-out;
  -moz-transition: opacity 1s ease-in-out;
  -o-transition: opacity 1s ease-in-out;
  transition: opacity 1s ease-in-out;
}

.cf img.top:hover {
  opacity:0;
}

</style>