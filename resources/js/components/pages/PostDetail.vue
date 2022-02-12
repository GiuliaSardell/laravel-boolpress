<template>
  <div class="container">
    <h2>
      {{post.title}}
    </h2>
    <span v-if="post.category">Category: {{post.category.name}}</span>
    <p
    v-for="(tag,index) in post.tags" :key="`tag${index}`">
    Tags: {{tag.name}}

    </p>
    <p style="margin: 20px 0;">
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
        content: '',
        category: {},
        tags: []
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
    console.log('category', this.post.category);
    console.log('tags', this.post.tags);
  }
}
</script>

<style lang="scss" scoped>
  h2{
    margin: 20px 0;
  }


</style>