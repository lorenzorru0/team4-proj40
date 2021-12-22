<template>
    <footer>
        <div class="container footerContainer col-12">
            <div class="row">
                <div>
                    <ul>
                        <li><a href="#"><span class="text-secondary titleFooter font-weight-bold">Deliveboo Restaurant</span></a></li>
                        <li><a href="#">integrazione del sistema di<br>Cassa</a></li>
                    </ul>
                    <div class="copy">
                        <a href="#"><img class="flag" src="data:image/jpeg;base64,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" alt="Language"></a>
                        <h6 class="copy_due"><i class="far fa-copyright c"></i>2021 Deliveboo</h6>
                    </div>
                </div>
                
                <div>
                    <ul>
                        <li><a href="#"><span class="text-secondary titleFooter font-weight-bold">Legal</span></a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Cookie</a></li>
                        <li><a href="#">Termini & condizioni</a></li>
                        <li><a href="#">Politiche</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a href="#"><span class="text-secondary titleFooter font-weight-bold">Help</span></a></li>
                        <li><a href="#">Aiuto</a></li>
                    </ul>
                </div>
                <div class="vuoi">
                    <h6 class="">Vuoi il tuo ristornate su Deliveboo?</h6>
                    <a href="/register"><button class="iscriviti  text-uppercase  font-weight-bold">Iscriviti</button></a>
                    <h6 class="seguici">Seguici</h6>
                    <div class="icon_fontawesome">
                        <a href="https://twitter.com/tweeter"><i class="fab fa-twitter icon_fontawesome"></i></a>
                        <a href="https://www.facebook.com/"><i class="fab fa-facebook-square icon_fontawesome"></i></a>
                        <a href="https://www.instagram.com/"><i class="fab fa-instagram-square icon_fontawesome"></i></a>
                        <a href="https://www.youtube.com/"><i class="fab fa-youtube icon_fontawesome"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</template>



<script>
export default {
    name: 'Footer'
}
</script>



<style lang="scss" scoped>
footer {
    background-color: rgba(177, 234, 248, 0.651);
    // border-top: 1px solid rgba(0, 140, 255, 0.521);
}

.footerContainer {
    padding: 2.7rem 0; 
    margin: auto;
    display: flex;
    align-items:center;
    justify-content: center;
    max-width: 100%;

    .row {
        margin: 0;
    } 
}

.titleFooter {
    margin-bottom: 30px;
}


ul, li, a {
    list-style: none;
    color: rgb(172, 172, 172);
    font-size: .9375rem;
    text-decoration: none;
}


.iscriviti {
    color:rgb(255, 255, 255);
    background-color: #38c172;
    border: none;
    border-radius: 0.25rem;
    padding: 5px;
    width: 100px;
}

.iscriviti:hover {
    background: coral;
    transition: 1s;
}

.vuoi {
    padding-left: 3.125rem;
    padding-top: 10px;
    position: relative;
}

.icon_fontawesome {
    display: flex;
    color: rgb(172, 172, 172);
    padding-right: 20px;
    padding-top: 35px;
    font-size: 30px;
}

.icon_fontawesome:hover {
    color: rgb(6, 114, 255);
    transition: 1s;
}

.seguici {
    position: absolute;
    top: 110px;
    color: gray
}

.flag {
    border-radius: 50px;
    width: 20px;
    margin-left: 40px;
}

.copy {
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: gray;
}

.copy_due,
.c {
    margin-bottom: 0px;
    font-size: 12px;
}

</style>