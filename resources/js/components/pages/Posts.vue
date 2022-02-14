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
    

      <div class="buttonsTagsCategories">

        <div class="categoriesBox">
          <h3>Categorie</h3> 
          <div class="categoriesList">
            <span>categorie</span>
            <span>categorie</span>
            <span>categorie</span>
            <span>categorie</span>
          </div>
          
        </div>
        
        <div class="tagsBox">
          <h3>Tags</h3>
          <div class="tagsList">
            <span>Tags</span>
            <span>Tags</span>
            <span>Tags</span>
            <span>Tags</span>
          </div>
          
        </div>
      </div>

    </div>
   
  </main>

  
</template>

<script>

import PostItems from '../partials/PostItems';

export default {
  name: 'Posts',
  components: {
    PostItems
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

  .categoriesBox, .tagsBox{
    border: 1px solid black;
    padding: 10px;
    margin: 20px 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    .categoriesList, .tagsList{
      display: flex;
      justify-content: center;
      align-items: center;
      flex-wrap: wrap;
    }

    span{
      display: inline-block;
      padding: 5px;
      margin: 10px;
      background-color: lightblue;
      cursor: pointer;
      &:hover{
        color: white;
      }

    }
  }

  .tagsList{
    span{
      background-color: lightgreen;
    }
  }

}
</style>