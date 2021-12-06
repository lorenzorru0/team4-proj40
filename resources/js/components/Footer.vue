<template>
    <footer>
        <div>
            <ul>
                <li><span class="text-dark titleFooter font-weight-bold">Deliveroo Restaurant</span></li>
                <li>signature</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
            </ul>
        </div>
         <div>
            <ul>
                <li><span class="text-dark titleFooter font-weight-bold">Legal</span></li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
            </ul>
        </div>
         <div>
            <ul>
                 <li><span class="text-dark titleFooter font-weight-bold">Help</span></li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
            </ul>
        </div>
        <div>
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



<style lang="scss">
footer{
    padding: 50px; 
    max-width: 100%;
    margin: auto;
    background-color: rgb(230, 230, 230);
    display: flex;
    align-items:center;
    justify-content: space-around;
}


ul, li {
    list-style: none;
    color: rgb(177, 177, 177);
}

.iscriviti {
    color:rgb(255, 255, 255);
    background-color: rgb(0, 240, 188);
    border: none;
    border-radius: 10%;
    padding-left: 15px;
    padding-right: 15px;
}

</style>