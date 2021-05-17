<template>
    <div class="container">
        <!-- login form -->
        <div v-if="!bookings.length">
            <div class="row mt-4">
                <div class="col-6 offset-3">
                    <h1>Meeting Room Bookings</h1>
                    <h2>Sign in to continue</h2>
                    <form action="#" @submit.prevent="handleLogin">
                        <div class="form-row">
                            <input type="email" name="email" v-model="formData.email" class="form-control"
                                   placeholder="Email Address">
                        </div>
                        <div class="form-row">
                            <input type="password" name="password" v-model="formData.password" class="form-control"
                                   placeholder="Password">
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary">Sign In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- list of bookings -->
        <div v-if="bookings.length">
            <h1>Meeting Room Bookings</h1>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Booked By</th>
                        <th>Room No.</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>From</th>
                        <th>To</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bookings" v-for="(booking, index) in bookings" :key="index">
                        <td><em v-text="booking.user_name"></em></td>
                        <td><em v-text="booking.room_number"></em></td>
                        <td><em v-text="booking.room_name"></em></td>
                        <td><em v-text="booking.date_booked"></em></td>
                        <td><em v-text="booking.time_start"></em></td>
                        <td><em v-text="booking.time_end"></em></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bookings: [],
            formData: {
                email: '',
                password: '',
            }
        }
    },
    methods: {
        handleLogin() {
            // send axios request to login route
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', this.formData).then(response => {
                    this.getBookings()
                });
            });
        },
        getBookings() {
            axios.get('/api/bookings').then(response => {
                //console.log(response.data);
                this.bookings = response.data.data;
                console.log(this.bookings);
                console.log(this.bookings.length);
            });
        }
    }
}
</script>

<style>
.form-row {
    margin-bottom: 12px;
}
</style>
