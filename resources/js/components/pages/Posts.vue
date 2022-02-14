<template>
  <main>
    
    <div class="container">

      <div class="postsList" v-if="posts">
        <h1>i miei post</h1>
        <PostItems
          v-for="post in posts"
          :key="post.id" 
          :post = "post"
        />

        <button
        @click="getPosts(pages.current -1)"
        :disabled = "pages.current === 1"
        >Prev</button>
        <button
        @click="getPosts(pages.current +1)"
        :disabled = "pages.current === pages.last"
        >Next</button>

      </div>
    
      <div v-else>
          <h3>Loading...</h3>     
      </div>
    
      <Sidebar 
        :tags="tags"
        :categories="categories"
      />
   

    </div>
   
  </main>

  
</template>

<script>

import PostItems from '../partials/PostItems';
import Sidebar from '../partials/Sidebar.vue';

export default {
  name: 'Posts',
  components: {
    PostItems,
    Sidebar
  },
  data(){
    return{
      apiUrl: 'http://127.0.0.1:8000/api/posts?page=', //prendo tutti i post
      posts: null, //per gestire il loading
      pages: {},
      tags: [],
      categories: []
    }
  },
  mounted(){
    this.getPosts();
  },
  methods: {
    getPosts(page = 1){
      axios.get(this.apiUrl + page)
      .then(res => {
        this.posts = res.data.posts.data;
        this.categories = res.data.categories;
        this.tags = res.data.tags;
        console.log('categories', this.categories, 'tags', this.tags)
        console.log(this.posts)
        this.pages = {
          current: res.data.current_page,
          last: res.data.last_page
        };
      })
    }
  }
}
</script>

<style lang="scss" scoped>
main{
  padding: 30px 0;
  .container{
    margin-bottom: 50px;
    display: flex;
  }
  .postsList{
    
    margin: 0 50px;
  }

}
</style>