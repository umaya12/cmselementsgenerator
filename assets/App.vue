<template>
  <h2>Hallo Muhammad {{ counter }}</h2>
  <button @click="counter++">Plus</button>
</template>


<script>

export default {
  data: () => ({
    counter: 0,
  })
}

</script>