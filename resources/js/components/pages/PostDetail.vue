<template>
  <div>
    <h1> Post detail </h1> 
    <h2>
      <!-- {{post.title}} -->
    </h2>
  </div>

</template>

<script>
export default {
  name:'PostDetail',
  data(){
    return {
      apiUrl: 'http://127.0.0.1:8000/api/posts',
      post: {
        title: '',
        content: ''
        // category: {},
        // tags: []
      }
      
    }
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl + this.$route.params.slug)
      .then(res => {
        this.post = res.data
        console.log(this.post);
      })
    }
  },
  mounted(){
    this.getApi();
    console.log(this.$route.params.slug);
  }
}
</script>

<style lang="scss" scoped>

</style>