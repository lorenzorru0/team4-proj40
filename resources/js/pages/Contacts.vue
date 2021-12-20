<template>
    
<div class="contacts">
    <div class="sectionOneMain">
        <div class="bloccoTitolo">
            <div>
                <h2 class="my-5 text-center text-uppercase if font-weight-bold">contattaci</h2>
            </div> 
            <div>
                <section class="line dark"></section>
            </div>
            <div id="title">
                <h5 class="text-uppercase if why col-12">Come contattarci quando hai bisogno di aiuto, inclusa l'assistenza per gli ordini attivi per partner di ogni tipo.
                </h5>
            </div>

        <div class="imagineContattaci my-5">
            <div class="testoContattaci">
                <h2 class=" font-weight-bold my-3 ">Contattaci</h2>
                <h5>Hai una domanda, oppure hai bisogno di consigli o <br>assistenza?</h5>
                <h5>Siamo qui per offrirti il nostro supporto in diversi modi.</h5>
                <h5>Contattaci attraverso le nostre reti sociali.</h5>
            </div>
            <img class="imgContact" src="images/technology - Copia.jpg" alt="">
        </div>

            <form class="container">
            
                <div class="form-group ">
                    <label for="name">Nome</label>
                    <input  required type="text" class="form-control w-50" id="name" placeholder="Inserisci il tuo nome">
                </div>
                <div class="form-group  ">
                    <label for="email">Email address</label>
                    <input  required type="email"  class="form-control w-50" id="email" aria-describedby="emailHelp" placeholder="Inserisci e-mail ">
                    <small id="emailHelp" class="form-text text-muted">Avremo premura di ricontattarti il prima possibile</small>
                </div>
                    <div class="form-group">
                    <label for="textarea">Inserisci qui il tuo commento</label>
                    <textarea class="form-control w-50" id="textarea" rows="3"></textarea>
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Invia</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contattaci</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Grazie per averci contattato <br>
                                Provvederemo a rispondere quanto prima!
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" >Chiudi</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                        </div>
                    </div>
                </div>
            
            </form>

            <!-- <div class="blocInput">
                <div>
                    <input class="input" type="text" placeholder="  NAME*"> 
                </div>

                <div>
                    <input class="input" type="text" placeholder="  EMAIL*"> 

                </div>
                <img class="imgContact" src="images/technology - Copia.jpg" alt="">
            </div>

            <form @submit.prevent="sendForm()" class="container">

                <div class="form-group ">
                    <label for="name">Nome</label>
                    <input   type="text" class="form-control w-50" id="name" placeholder="Inserisci il tuo nome">
                </div>

                <div class="form-group  ">
                    <label for="email">Email address</label>
                    <input  type="email"  class="form-control w-50" id="email" aria-describedby="emailHelp" placeholder="Inserisci e-mail ">
                    <small id="emailHelp" class="form-text text-muted">Avremo premura di ricontattarti il prima possibile</small>
                </div>
                    <div class="form-group">
                    <label for="textarea">Inserisci qui il tuo commento</label>
                    <textarea class="form-control w-50" id="textarea" rows="3"></textarea>
                </div>


                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Invia</button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contattaci</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Grazie per averci contattato <br>
                                Provvederemo a rispondere quanto prima!
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" >Chiudi</button>
                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                        </div>
                        </div>
                    </div>
                </div>

            </form>

                <div>
                    <button> Contattaci</button> 
                </div>
            </div> -->

        </div>
        <div class="container blocText">
            <div class="row row-cols-lg-3 bloccoLorem">
                <div>
                    <img class="support" src="images/support-2 icon - Copia.svg" alt="supporto">
                    <h3 class="font-weight-bold">Assistenza per ordini attivi</h3>
                        <h6 class="if secondText">Assistenza telefonica per oridini attivi 24 ore su 24,<br> 7 giorni su 7</h6>
                </div>

                <div>
                    <img class="supportDue" src="images/thumbs-up-watch icon 2 - Copia.svg" alt="thumb up">   
                    <h3 class="font-weight-bold">Soluzioni rapide</h3>
                        <h6 class="if secondText">Cerca le risposte alle domande piu comuni nella sezione "Aiuto"</h6>
                </div>

                <div>
                    <img class="supportDue" src="images/Laptop icon 2 - Copia.svg" alt="notebook">
                    <h3 class="font-weight-bold">A portata di mano</h3>
                        <h6 class="if secondText">Utilizza il Restaurant Hub per gestire il tuo account e contattare il nostro team</h6>
                </div>
            </div>
            <div>
                <img class="imagineCucino" src="images/imagine_cucino.png" alt="">
            </div>
        </div>
</div>


</template>

<script>


export default {
    name: 'Contacts',
    data(){
        return{
            name : '',
            email : '',
            message : '',
            errors : {},
            success : false
        }
    },
    methods:{
        sendForm(){
            this.sending = true;
            this.sending = false;
            axios.post('/api/contacts',{
                "name":this.name,
                "email":this.email,
                "message":this.message,
            }).then((response)=>{
                this.sending = false;
                if(!response.data.success){
                    this.errors=response.data.errors;
                    this.success = false;
                }
                else{
                    this.name = '';
                    this.email = '';
                    this.message = '';
                    this.errors = {};
                    this.success = true;

                }
            });
        }
    }
}

</script>

<style scoped lang="scss" scoped>

.contacts {
    background-color: #ebeced;
}

.bloccoTitolo {
    // text-align: center;
    padding-top: 100px;
    color: rgb(0, 0, 0)
}

.loremMainOne {
    padding: 40px;
    padding-bottom: 60px;
}

.if {
    color: #000000;
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
    color: rgb(168, 168, 168)
}

.imagineContattaci {
    display: flex;
    justify-content: center;
}

.imgContact { 
    width: 30%;
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
    background: #ffffff00;
    color: #525252;
    padding: 80px;
    text-align: center;
    max-width: 70%;
    border-top: 1px solid rgb(206, 206, 206);
}  

.secondText {
    color: rgb(111, 135, 148);
    // line-height: 20px;
    text-align: center;
    padding: 30px;
}

.support {
    width: 150px;
}

.supportDue{
    width: 150px;
}

.imagineCucino{
    width: 40%;
    padding-top: 40px;
}

</style>