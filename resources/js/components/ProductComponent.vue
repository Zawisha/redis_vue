<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        <form @submit.prevent="createProduct">
                            <div class="form-group">
                                <label for="name">name</label>
                                <input v-model="product.name" type="text" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="year">year</label>
                                <input v-model="product.year" type="text" id="year" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="price">price</label>
                                <input v-model="product.price" type="text" id="price" class="form-control">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {

        data()
        {
            return {
                test:[],
                product: {

                },

            }
        },

        mounted() {
            var socket = io('http://localhost:3000');
            socket.on("my-channel:\\App\\Events\\MyChartEvent",function(data){
                this.test = data.message;
            }.bind(this));

        },
        methods: {

            createProduct()
            {

                axios.post('/products', this.product).then((response)=>
                {


                });

                console.log(this.product);



            }

        }
    }
</script>
