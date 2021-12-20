<template>
    <footer>
        <div class="container footerContainer">
            <div class="row mx-0">
                <div class="col d-flex justify-content-center flex-column">
                    <div class="full-name d-flex justify-content-center">Andrea Geraci</div>
                    <div class="contacts d-flex justify-content-center">
                        <a href="https://github.com/touros91" target="_blank"><i class="fab fa-github"></i></a>  
                        <a href="https://www.linkedin.com/in/andrea-geraci-web-developer/" target="_blank"><i class="fab fa-linkedin"></i></a> 
                    </div>
                </div>
                <div class="col d-flex justify-content-center flex-column">
                    <div class="full-name d-flex justify-content-center">Lorenzo Orrù</div>
                    <div class="contacts d-flex justify-content-center">
                        <a href="https://github.com/lorenzorru0" target="_blank"><i class="fab fa-github"></i></a>  
                        <a href="https://www.linkedin.com/in/lorenzo-orrù/" target="_blank"><i class="fab fa-linkedin"></i></a> 
                    </div>
                </div>
                <div class="col d-flex justify-content-center flex-column">
                    <div class="full-name d-flex justify-content-center">Michele Amoruso</div>
                    <div class="contacts d-flex justify-content-center">
                        <a href="https://github.com/Mikele91"><i class="fab fa-github" target="_blank"></i></a>  
                        <a href="https://www.linkedin.com/in/michele-amoruso-webdeveloper/"><i class="fab fa-linkedin" target="_blank"></i></a>
                    </div>
                </div>
                <div class="col d-flex justify-content-center flex-column">
                    <div class="full-name d-flex justify-content-center">Ilario Cocco</div>
                    <div class="contacts d-flex justify-content-center">
                        <a href="https://github.com/IlarioCocco" target="_blank"><i class="fab fa-github"></i></a>  
                        <a href="https://www.linkedin.com/in/ilario-cocco-ba728a10a/" target="_blank"><i class="fab fa-linkedin"></i></a> 
                    </div>
                </div>
                <div class="col d-flex justify-content-center flex-column">
                    <div class="full-name d-flex justify-content-center">Simone Severini</div>
                    <div class="contacts d-flex justify-content-center">
                        <a href="https://github.com/SamSepiool" target="_blank"><i class="fab fa-github"></i></a>  
                        <a href="www.linkedin.com/in/simone--severini" target="_blank"><i class="fab fa-linkedin"></i></a> 
                    </div>
                </div>
            </div>
            <div class="row mx-0">
                <div class="col-6 d-flex flex-column align-items-center margin">
                    <h6 class="font-weight-bold">Vuoi il tuo ristorante su Deliveboo?</h6>
                    <a href="/register"><button class="iscriviti">Iscriviti</button></a>
                </div>
                <div class="col-6 d-flex flex-column align-items-center margin">
                    <h6>Seguici su Instagram</h6>
                    <a href="https://www.instagram.com/deliveboo40/" target="_blank"><i class="fab fa-instagram-square icon_fontawesome"></i></a>
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
    background-color:  #a7a7a748;
}

.footerContainer {
    padding: 2.5rem 0; 
}

ul, li, a {
    list-style: none;
    color: rgba(189, 189, 189, 0.596);
    font-size: .9375rem;
    text-decoration: none;
}

ul{
    padding: 0 0 0 3.125rem;
}

.iscriviti {
    color:rgb(255, 255, 255);
    background-color: #2993e9;
    border: none;
    border-radius: 5px;
    padding-left: .9375rem;
    padding-right: .9375rem;
}

i {
    font-size: 25px;
    margin: 5px;
}

.fa-linkedin {
    color: #0966C2;
}

.full-name {
    font-size: 20px;
    width: 190px;
    margin: 0 auto;
}

a {
    text-decoration: none;
    color: black;
}

.fa-instagram-square {
    color: #CA34AC;
    font-size: 30px;
}

.margin {
    margin-top: 60px;
}
</style>