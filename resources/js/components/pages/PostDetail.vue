<template>
  <div class="container">
    <h2>
      {{post.title}}
    </h2>
    <p>
      {{post.content}}
    </p>
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
      axios.get(this.apiUrl + '/' + this.$route.params.slug)
      .then(res => {
        this.post = res.data
        console.log('post ',this.post);
      })
    }
  },
  mounted(){
    this.getApi();
    console.log('api ',this.$route.params.slug);
  }
}
</script>

<style lang="scss" scoped>
h2{
  margin: 20px 0;
  
}

</style>