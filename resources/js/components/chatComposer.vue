<template>
    <div class="chat-composer">
        <input type="text" placeholder="New message..." v-model="newText" v-on:keyup.enter="sendMessage()">
        <button class="btn btn-primary" @click="sendMessage()">Send</button>
    </div>
</template>

<script>
export default {
    data(){
        return{
            newText: ''
        }
    },
    methods: {
        sendMessage(){
           //console.log(this.newText);
           this.$emit('messagesent', {
             message:  this.newText,
             user: {
                 name: 'the rock'
             } 
           });
            this.newText = '';
        }
    }

}
</script>

<style>
.chat-composer{
    display: flex;
}

.chat-composer input{
    flex: 1 auto;
}
.chat-composer button{
    border-radius: 0;
}
</style>
