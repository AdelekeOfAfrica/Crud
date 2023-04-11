<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>  
    <div class="wrapper">
      <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
          <RouterLink to="/books" class="navbar-brand" style="color:white">Harde Assessment</RouterLink>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              <li class="nav-item">
                <RouterLink to="/books" class="nav-link"  style="color:white">Books</RouterLink>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

