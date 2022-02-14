<template>
<div>
  <div class="buttonsTagsCategories">

    <div class="categoriesBox">
      <h3>Categorie</h3> 
       <div class="categoriesList">
        <span
          v-for="category in categories"
          :key="`cat${category.id}`"
          @click="$emit('getPostCategory', category.name)"
        >
          {{category.name}}
        </span>
        
      </div>
          
    </div>
        
    <div class="tagsBox">
      <h3>Tags</h3>
      <div class="tagsList">
        <span
          v-for="tag in tags"
          :key="`tag${tag.id}`"
        >
          {{tag.name}}
        </span>
        
      </div>
          
    </div>
  </div>
</div>

</template>

<script>
export default {
  name: 'Sidebar',
  props:{
    'tags' : Array,
    'categories' : Array
  }

}
</script>

<style lang="scss" scoped>
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

</style>