<template>
    <card v-bind:class="bgStatus" class="flex flex-col">

        <div>
            <div class="px-3 py-3">
                <div class="position-absolute float-right">
                    <img v-if="card.icon"  width="40px" height="40px" :src="card.icon">
                </div>
                <h3 class="mb-1 text-90 font-bold text-lg text-white">{{card.title}}</h3>
                <p class="text-5xl text-white font-weight-black text-center pt-2 capitalize" @click="clicked(!status)">{{status}}

                </p>
            </div>
            <div class="px-3">
                <h3 class="text-white text-80 font-bold " >{{message}}</h3>
            </div>
        </div>


    </card>
</template>

<script>
    export default {
        props: ['card'],
        data() {
            return {
                bgStatus: '',
                status: '',
                message: '',
                bgClassStatus: {
                    pass: 'bg-success',
                    fail: 'bg-danger',
                    other: 'bg-info'
                }
            }


        },
        created: function() {
            if(this.card.url) {
                this.fetchEventsList()
                this.timer = setInterval(this.fetchEventsList, this.card.fetchInterval)
            }
            else
            {
                this.message = 'No URL specfied'
                this.bgStatus ='bg-danger'
                this.status = 'BROKEN'
            }
        },
        methods: {

            fetchEventsList: function () {
                let self = this;
                axios.get(this.card.url)
                    .then(function (response) {

                        self.handleResponse(response)

                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            handleResponse: function (response)
            {

                if(this.bgClassStatus[response.data.status] == undefined)
                {
                    this.bgStatus = 'bg-danger'
                    this.status = response.data.status
                    this.message = 'unknown Status Returned'
                }
                else
                {
                    this.bgStatus = this.bgClassStatus[response.data.status]
                    this.status = response.data.status
                    this.message = response.data.message
                }

            }
        },


    }
</script>
