/*
*
*/
<template>
    <Header @toggleSidebar="handleSideBarVisibility" :isloged="getUser().bool" />
    <SideBar :isopen="isSidebarOpen" @toggleSidebar="handleSideBarVisibility" />
    <Carousel />
    <div class="w-full px-[4%] my-11 flex">
        <Tag  title="All" :id="-1" :key="-1" :hover="true" @selectTag="()=>{window.location.href = '/'}"/>
        <Tag v-for="tag in tags" :title="tag.title" :id="tag.id" :key="tag.id" :hover="true" @selectTag="selectTag" :isSelected="selectTag.value == tag.id"/>
    </div>
    <div class=" mx-[4%] my-11 flex flex-wrap gap-2 justify-center sm:justify-start">
        <Product v-for="product in products" :key="product.id" :product="product" @addProductToCart="addProductToCart"/>
    </div>
    <Footer />
</template>

<script setup>
import Header from "../components/Header.vue";
import Product from "../components/Product.vue";
import SideBar from "../components/SideBar.vue";
import Carousel from "../components/Carousel.vue";
import Tag from "../components/Tag.vue";
import Footer from "../components/Footer.vue";
import { onMounted, ref } from "vue";
import { getUser, toggleSidebar } from "../utils/utils";
import { fetchProducts, fetchTags, fetchProductsByTag } from "../utils/api";
import axios from "axios";

const products = ref([]);
const tags = ref([]);
const isSidebarOpen = ref(false);
const selectedTag = ref(null);


const handleSideBarVisibility = () => {
    toggleSidebar(isSidebarOpen);
};

// get tags
fetchTags().then((data) => {
    tags.value = data;
});
// get products
fetchProducts().then((data) => {
    products.value = data;
});

const addProductToCart = (id) => {
    if (!isloged.value) window.location.href = '/login';
};

// const filter by tag
const selectTag = (id) => {
    fetchProductsByTag(id).then((data) => {
        products.value = data;
    });
    selectTag.value = id;
};

</script>
