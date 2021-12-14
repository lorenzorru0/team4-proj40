<template>
    <footer>
        <div class="container footerContainer">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4">
                <div class="col">
                    <ul>
                        <li><a href="#"><span class="text-dark titleFooter font-weight-bold">Deliveroo Restaurant</span></a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li><a href="#"><span class="text-dark titleFooter font-weight-bold">Legal</span></a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                    </ul>
                </div>
                <div class="col">
                    <ul>
                        <li><a href="#"><span class="text-dark titleFooter font-weight-bold">Help</span></a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                        <li><a href="#">signature</a></li>
                    </ul>
                </div>
                <div class="col vuoi">
                    <h6 class="font-weight-bold">Vuoi il tuo ristornate su Deliveroo?</h6>
                    <a href="/register"><button class="iscriviti">Iscriviti</button></a>
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
    background-color: rgb(230, 230, 230);
}

.footerContainer {
    padding: 2.5rem 0; 
}

ul, li, a {
    list-style: none;
    color: rgb(177, 177, 177);
    font-size: .9375rem;
    text-decoration: none;
}

.iscriviti {
    color:rgb(255, 255, 255);
    background-color: rgb(212, 0, 240);
    border: none;
    border-radius: 10%;
    padding-left: .9375rem;
    padding-right: .9375rem;
}

.vuoi {
    padding-left: 3.125rem;
    padding-top: 25px;
    position: relative;
}

.icon_fontawesome {
    display: flex;
    color: rgb(172, 172, 172);
    margin-right: 10px;
    padding-top: 35px;
    font-size: 20px;
}

.seguici {
    position: absolute;
    top: 120px;
    color: gray
}

</style>