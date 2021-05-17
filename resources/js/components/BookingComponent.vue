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
            <nav aria-label="Booking Page navigation">
                <ul class="pagination">
                    <li class="page-item" v-bind:class="{ disabled: isFirstPage }">
                        <a class="page-link" v-bind:href="pagination.links.first">First</a>
                    </li>
                    <li class="page-item" v-bind:class="{ disabled: isPrevPage }">
                        <a class="page-link" v-bind:href="pagination.links.prev">Previous</a>
                    </li>
                    <li class="page-item" v-bind:class="{ disabled: isNextPage }">
                        <a class="page-link" v-bind:href="pagination.links.next">Next</a>
                    </li>
                    <li class="page-item" v-bind:class="{ disabled: isLastPage }">
                        <a class="page-link" v-bind:href="pagination.links.last">Last</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            bookings: [],
            pagination: {
                links: {},
            },
            formData: {
                email: '',
                password: '',
            },
            isPrevPage: false,
            isFirstPage: false,
            isLastPage: false,
            isNextPage: false,
        }
    },
    mounted() {
        this.getBookings();
    },
    methods: {
        handleLogin() {
            // send axios request to login route
            axios.get('/sanctum/csrf-cookie').then(() => {
                axios.post('/login', this.formData).then((response) => {
                    this.getBookings()
                });
            });
        },
        getBookings(page = 1) {
            axios.get('api/bookings?page=' + page)
                .then(response => {
                    this.bookings = response.data.data;
                    console.log(this.bookings);
                    this.pagination.links = response.data.links;
                    this.isPrevPage = this.pagination.links.prev === null;
                    this.isFirstPage = this.pagination.links.first === null;
                    this.isLastPage = this.pagination.links.last === null;
                    this.isNextPage = this.pagination.links.next === null;
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
