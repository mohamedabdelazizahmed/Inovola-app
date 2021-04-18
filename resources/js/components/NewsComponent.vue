<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">News Table</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">
                                        #
                                    </th>
                                    <th scope="col">title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col" @click="sortRating()">Rating <i :class="isRatingAsc? 'bi bi-arrow-up':'bi bi-arrow-down'"></i></th>
                                    <th scope="col" @click="sortDate()">DateTime <i :class="isDateAsc? 'bi bi-arrow-up':'bi bi-arrow-down'"></i></th>
                                </tr>
                            </thead>
                                <tbody>
                                    <tr v-for="(api,index) in data" :key="index">
                                    <th scope="row">{{index}}</th>
                                    <td>{{api.title}}</td>
                                    <!-- <pre>{{api.Content}}</pre> -->
                                    <td>{{api.Content}}</td>
                                    <td>{{api.rating}}</td>
                                    <td>{{api.datetime}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <pagination :data="paginate"
                                @pagination-change-page="getResultsPagination"></pagination> -->
                            <nav aria-label="...">
                                <ul class="pagination" v-if="links">
                                    <li class="page-item" :class="link.active ? 'active' : ''" v-for="(link, index) in links" :key="index">
                                        <a class="page-link" @click.prevent="paginate(link.url)" v-html="link.label"></a>
                                    </li>
                                </ul>
                            </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data:function() {
            return {
                URL:"/api/news",
                data:null,
                links:null,
                isRatingAsc: true,
                isDateAsc: true,
            }
        },
        mounted() {
            console.log('Component mounted.')
            this.getData();
        },
        methods:{
            getData(){
            axios
            .get(this.URL)
            .then(response => {
                this.data = response.data.data;
                this.links = response.data.links;

            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
            },
            paginate(url) {
                axios
            .get(this.URL + url)
            .then(response => {
                this.data = response.data.data;
                this.links = response.data.links;

            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)
            },
            sortRating() {
                axios
            .get(this.URL + '?rating=' + (this.isRatingAsc ? 'asc' : 'desc'))
            .then(response => {
                this.data = response.data.data;
                this.links = response.data.links;
                this.isRatingAsc = !this.isRatingAsc;
                this.isDateAsc = true;
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)

            },
            sortDate() {
                axios
            .get(this.URL + '?date=' + (this.isDateAsc ? 'asc' : 'desc'))
            .then(response => {
                this.data = response.data.data;
                this.links = response.data.links;
                this.isDateAsc = !this.isDateAsc;
                this.isRatingAsc = true;
            })
            .catch(error => {
                console.log(error)
                this.errored = true
            })
            .finally(() => this.loading = false)

            }
        }
    }
</script>
