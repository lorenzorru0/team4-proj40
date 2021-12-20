<template>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 video">
            <img src="https://i2.wp.com/devdactic.com/wp-content/uploads/2021/05/ionic-deliveroo.gif?resize=323%2C627&ssl=1" alt="">
        </div>  
        <div class="about col-12">
            <h2 class="title text-uppercase font-weight-bold">Deliveboo è una piattaforma che accontenta ogni tua richiesta</h2> 
        </div>
        <h3 class="about col-12">Fai visita ai nostri Partner</h3>
    </div> 
    
    <div class="about view text-uppercase text-center">
        <ul class="view row">
            <li class="view col d-flex flex-column align-items-center">
                <a href="https://matcha.com/"><img class="a" src="images/uno.png" alt="Macha"></a>
            </li>
            <li class="view col d-flex flex-column align-items-center">
                <a href="https://lievital.it/"><img class="a" src="images/quattro.png" alt="Lievita"></a>
            </li>
            <li class="view col d-flex flex-column align-items-center">
                <a href="https://www.temakinho.com/"><img class="a" src="images/tre.png" alt="Temakinho"></a>
            </li>
            <li class="view col d-flex flex-column align-items-center">
                <a href="https://www.starbene.it/"><img class="a" src="images/cinque.png" alt="Starbene"></a>
            </li>
            <li class="view col d-flex flex-column align-items-center">
                <a href="https://www.darumasushi.com/"><img class="a" src="images/due.png" alt="Daruma"></a>
            </li>
        </ul>
    </div>


        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <h2 class="unaRealta font-weight-bold">Una realtà consolidata con l'esperienza</h2>
                    <h6 class="unaRealta">
                        La società Deliveboo, con sede a Londra, è stata fondata nel 2013 da Will Shu e Greg Orlowski, entrambi statunitensi.
                        La società guadagna addebitando una commissione ai ristoranti e addebitando ai clienti una commissione per ordine. Opera in cinquecento città a livello glbale.
                        Gli ordini vengono effettuati tramite l'applicazione o tramite il sito e successivamente i rider (fattorini) trasportano il cibo dal ristorante fino all'indirizzo indicato dal cliente.
                    </h6>
                        
                    <h6 class="unaRealta">
                        Nel Regno Unito, oltre che con migliaia di ristoranti indipendenti, Deliveboo lavora con alcuni delle più grandi catene della ristorazione presenti nel paese. 
                        Il 16 novembre 2016, la società produttrice di birra Heineken International concluse un accordo con Deliveboo per la consegna di birre.
                        Nel gennaio 2017, Deliveboo annunciò l'intenzione di creare 300 posti di lavoro in ambito tecnologico nel Regno Unito in vista dell'apertura della nuova sede di Londra alla fine dello stesso anno.
                    </h6>

                    <h6 class="unaRealta">
                        A metà giugno 2016, i fondatori di Deliveboo, Will Shu e Greg Orlowski hanno ricevuto un premio per i "Best Startup Founders" nell'ambito di "The Europas Startup Conference and Awards", 
                        assegnati a società tecnologiche. La società ha anche vinto il premio "Fastest Rising Startup of the Year" e il premio "Europas Grand Prix".
                    </h6>
                </div>

                <div class="col-sm-12 col-md-6 d-flex flex-column align-items-center">  
                    <div class="founder">
                        <img src="https://deliveroo.it/assets/images/about-us/technology.jpg" alt="">
                    </div>
                    <div class="founder">
                        <img src="https://storage.ecodibergamo.it/media/photologue/2017/11/16/photos/cache/deliveroo-sbarca-in-bici-a-bergamoi-piatti-dei-migliori-ristoranti-a-domi_ec14610a-ca94-11e7-9af1-e8c55fce35d3_700_455_big_gallery_linked_i.jpg" alt="">
                    </div>
                    <div class="founder">
                        <img src="https://images.squarespace-cdn.com/content/v1/545c89e5e4b039195ee53e4a/1563031324762-1ZULRWG9UXU5V7NSS0ZI/consumer.png?format=1000w" alt="">
                    </div>     
                </div>     
            </div>
        </div> 
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
    padding: 50px 0 10px 0;
}

.row {
    margin: 0;
}

.view{
   padding: 30px;
   background: #ffffff00;
   color: rgb(70, 70, 70);
   display: flex;
   align-items: center;
}

a {
    display: flex;
    justify-content: center;
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
.title {
    padding: 50px;
}

.unaRealta{
    padding: 30px;
}
.video {
    width: 120px;
    display: flex;
    justify-content: center;
    padding-top: 20px;
}
.founder {
    width: 350px;
    padding: 20px;
    img {
        width: 100%;
    }
}

.logo {
    width: 70%;
    padding-left: 170px;
    padding-top: 50px;
}

.imageProva {
    width: 300px;
    margin-left: 40px;
    img {
        width: 100%;
    }
}
</style>