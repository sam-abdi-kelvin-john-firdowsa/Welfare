<template>
   <div class="container">
       <p>{{ message.message }}</p>
       <small>{{ message.user.name }}</small>
    </div>
</template>

 <script>
 export default {
     props: ['message']
     
 }
 </script>

 <style>
 
 </style>
 
 

