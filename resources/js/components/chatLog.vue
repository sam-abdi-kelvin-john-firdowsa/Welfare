<template>
    <div class="chat-log">
        <chat-message v-for="message in messages" v-bind:message='message' :key="message.id"></chat-message>
         <div class="empty" v-show="messages.length === 0">
             No messages yet...
         </div>
        
    </div>
</template>

<script>
export default {

    props: ['messages']

}
</script>

<style>
.empty{
    text-align: center;
    padding: 1rem;
}
</style>

