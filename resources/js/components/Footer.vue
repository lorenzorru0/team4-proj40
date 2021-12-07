<template>
    <footer>
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
            <button class="iscriviti">Iscriviti</button>
        </div>

        
    </footer>
</template>



<script>
export default {
    name: 'Footer'
}
</script>



<style lang="scss" scoped>
footer{
    padding: 40px; 
    max-width: 100%;
    margin: auto;
    background-color: rgb(230, 230, 230);
    display: flex;
    align-items:center;
    justify-content: center;
}


ul, li, a {
    list-style: none;
    color: rgb(177, 177, 177);
    font-size: 15px;
}

.iscriviti {
    color:rgb(255, 255, 255);
    background-color: rgb(212, 0, 240);
    border: none;
    border-radius: 10%;
    padding-left: 15px;
    padding-right: 15px;
}

.vuoi {
    margin-bottom: 80px;
    padding-left: 50px;
}
</style>