<template>
    <div>
        <v-overlay v-if="isLoading" absolute="absolute" :value="isLoading">
            <v-progress-circular :size="50" indeterminate></v-progress-circular>
        </v-overlay>
        <div v-else class="mx-auto tw-mx-auto">
            <v-row class="d-flex justify-center">
                <v-col cols="2">
                    <span>Search:</span>
                </v-col>
                <v-col>
                    <v-menu v-model="toggleDatepicker" :close-on-content-click="false" :nudge-right="40" lazytransition="scale-transition">
                        <template v-slot:activator="{ on }">
                            <v-text-field label="Observation Date" readonly :value="observationDate" v-on="on" outlined></v-text-field>
                        </template>
                        <v-date-picker locale="en-in" min="2020-01-01" max="2021-04-16" v-model="observationDate" no-title @input="toggleDatepicker = false"></v-date-picker>
                    </v-menu>
                </v-col>
                <v-col>
                    <v-text-field v-model="maxResult" label="Max Result" outlined></v-text-field>
                </v-col>
                <v-col>
                    <v-btn @click="changeRoute">Submit</v-btn>
                </v-col>
            </v-row>
            <v-row class="justify-center">
                <v-data-table :headers="headers" :items="items" :items-per-page="10" class="elevation-1 justify-center"></v-data-table>
            </v-row>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
  created() {
      this.init();
  },
  data() {
      return {
          isLoading: true,
          headers: [
            {
              text: 'SNo',
              value: 'sno'
            },
            {
              text: 'Observation Date',
              value: 'observation_date'
            },
            {
              text: 'Country',
              value: 'country'
            },{
              text: 'Province/State',
              value: 'state'
            },
            {
              text: 'Confirmed',
              value: 'confirmed'
            },
            {
              text: 'Deaths',
              value: 'deaths'
            },
            {
              text: 'Recovered',
              value: 'recovered'
            },
            {
              text: 'Last Updated',
              value: 'last_updated'
            }
          ],
          items: [],
          observationDate: '',
          maxResult: 0
      }
  },
  methods: {
    init() {
      axios.get('/init')
        .then(response => {
          this.items = response.data;
          this.isLoading = false;
        });
    },

    changeRoute() {
      this.$router.push({path: '/top/confirmed', query: {observation_date: this.observationDate, max_results: this.maxResult}});
    }
  }
};
</script>