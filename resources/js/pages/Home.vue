<script lang="ts" setup>
    import Header from '../components/Header.vue'
    import Banner from '../components/Banner.vue'
    import ProductsDestaque from '../components/ProductsDestaque.vue'
    import Products from '../components/Products.vue'
    import Cart from '../components/Cart.vue'
    import About from '@/components/About.vue'
    import Form from '@/components/Form.vue'
    import Footer from '../components/Footer.vue'
    import Marquee from '@/components/Marquee.vue'
    import HeroImage from '@/components/HeroImage.vue'
    import KitDestaque from '@/components/KitDestaque.vue'
    import ProductCarousel from '@/components/ProductCarousel.vue'
    import LeadForm from '@/components/LeadForm.vue'
    import InstagramFeed from '@/components/InstagramFeed.vue'
</script>


<template>
    <Marquee />
    <Header />
    <div class="pt-[88px]">
        <HeroImage />
        <KitDestaque />
        <ProductCarousel />
        <About />
        <LeadForm />
        <InstagramFeed />
        <Footer />
    </div>
</template>

  