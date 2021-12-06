<template>
    <footer>
        <div>
            <ul>
                <li><span>Deliveroo Restaurant</span></li>
                <li>signature</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
            </ul>
        </div>
         <div>
            <ul>
                <li><span>Legal</span></li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
                <li>sono il footer</li>
            </ul>
        </div>
         <div>
            <ul>
                 <li><span>Help</span></li>
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
    padding: 5px;
}
</style>