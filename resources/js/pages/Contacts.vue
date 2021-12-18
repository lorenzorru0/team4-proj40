<template>
    
    <div class="contacts">
      <div class="sectionOneMain">
        <div class="bloccoTitolo">
            
            <div>
                <h2 class="text-uppercase if ">contattaci</h2>
            </div> 
            <div>
                 <section class="line dark"></section>
            </div>
            <div id="title">
                <h5 class="text-uppercase if why col-12">Come contattarci quando hai bisogno di aiuto, inclusa l'assistenza per gli ordini attivi per partner di ogni tipo.
                </h5>
            </div>

            <div class="blocInput">
                <div>
                    <input class="input" type="text" placeholder="  NAME*"> 
                </div>

                <div>
                    <input class="input" type="text" placeholder="  EMAIL*"> 
                </div>

                <div>
                    <input class="input" type="text" placeholder="  PHONE"> 

                </div>
                <div>
                    <input class="input danger" type="text" placeholder="SCRIVICI"> 
                </div>
            </div>
        </div>
      </div>
      <div class="imagineContattaci">
          <div class="testoContattaci">
            <h2>Contattaci</h2>
            <h5>Hai una domanda, oppure hai bisogno di consigli o <br>assistenza?</h5>
            <h5>Siamo qui per offrirti il nostro supporto in diversi modi.</h5>
          </div>
        <!-- <img class="pasta" src="images/restaurants.jpg" alt=""> -->
        <img class="imgContact" src="images/technology - Copia.jpg" alt="">
      </div>

      <!-- <div class="about view text-uppercase text-center">
        <ul class="view">
            <li class="view">
                <img src="images/support-2 icon - Copia.svg" alt="La Piadineria">
            </li>
            <li class="view">
                <img src="images/thumbs-up-watch icon 2 - Copia.svg" alt="La Piadineria">
            </li>
            <li class="view">
                <img src="images/Laptop icon 2 - Copia.svg" alt="notebook">
            </li>
        </ul>
      </div>

    <div>
    <div class="dimensionOne d-flex">
        <div class="oneImg">
        </div>
        <div class="twoImg">
        </div>
        <div class="treeImg">
        </div>
    </div> -->

    <div class="container blocText">
         <div class="row row-cols-lg-3 bloccoLorem">
             <div>
                 <img class="support" src="images/support-2 icon - Copia.svg" alt="supporto">
                 <h3>Assistenza per ordini attivi</h3>
                    <h6 class="if secondText">Assistenza telefonica per oridini attivi 24 ore su 24, 7 giorni su 7</h6>
             </div>

              <div>
                 <img src="images/thumbs-up-watch icon 2 - Copia.svg" alt="thumb up">   
                 <h3>Soluzioni rapide</h3>
                    <h6 class="if secondText">Cerca le risposte alle domande piu comuni nella sezione "Aiuto"</h6>
             </div>

              <div>
                 <img src="images/Laptop icon 2 - Copia.svg" alt="notebook">
                 <h3>A portata di mano</h3>
                    <h6 class="if secondText">Utilizza il Restaurant Hub per gestire il tuo account e contattare il nostro team</h6>
             </div>
        </div>

    </div>
</div>



      
  </div>
</template>

<script>


export default {
    name: 'Contacts'
}
</script>

<style scoped lang="scss" scoped>

.contacts {
    background-color: #ebeced;
}

.bloccoTitolo {
    text-align: center;
    padding-top: 80px;
    color: rgb(0, 0, 0)
}

.loremMainOne {
    padding: 40px;
    padding-bottom: 60px;
}

.if {
    color: #6e89a0;
    line-height: 20px;
}

.why {
    padding-left: 30%;
    padding-right: 30%;
    padding-top: 30px;
}

.dark {
    background: rgb(149, 177, 186);
}

.blocInput {
    padding-top: 10px;
    padding-bottom: 80px;
}


.input { 
    border: none;
    width: 30%;
    font-size: 10px;
    margin-top: 20px;
    line-height: 30px;
}

.danger  {
    background: #73d29ef8;
    text-align: center;
    font-size: 15px;
    color: white;
}

::placeholder {
    color: rgb(213, 213, 213)
}

.imagineContattaci {
    display: flex;
    justify-content: center;
}

.imgContact { 
    width: 40%;
    padding: 30px;
    padding-bottom: 70px;
}

.testoContattaci {
    padding: 20px;
}

.about {
    display: flex;
    align-items: center;
    justify-content: space-around;
}

.view{
   padding: 30px;
   display: flex;
   align-items: center;
}



.blocText {
    padding-top: 20px;
    background: #ffffff57;
    color: #7c7c7c;
    padding: 60px;
    text-align: center;
    max-width: 100%;
}  

.secondText {
    color: rgb(111, 135, 148);
    line-height: 20px;
    padding-bottom: 20px;
    text-align: center;
    padding: 20px;
}

.support {
    width: 104px;
}



</style>