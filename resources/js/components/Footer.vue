<template>
    <footer>
        <div class="container footerContainer">
            <div>
                <ul>
                    <li><a href="#"><span class="text-dark titleFooter font-weight-bold">Deliveroo Restaurant</span></a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="#"><span class="text-dark titleFooter font-weight-bold">Legal</span></a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="#"><span class="text-dark titleFooter font-weight-bold">Help</span></a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                    <li><a href="#">signature</a></li>
                </ul>
            </div>
            <div class="vuoi">
                <h6>Vuoi il tuo ristornate su Deliveroo?</h6>
                <a href="/register"><button class="iscriviti">Iscriviti</button></a>
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
    margin: auto;
    display: flex;
    align-items:center;
    justify-content: space-between;
}


ul, li, a {
    list-style: none;
    color: rgb(177, 177, 177);
    font-size: .9375rem;
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
    margin-bottom: 5rem;
    padding-left: 3.125rem;
}
</style>