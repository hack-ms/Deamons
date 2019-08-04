import Vue from 'vue';
import Vuex from 'vuex';

import http from '@/config/http';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    listUbs: [],
    ubsSelected: '',
  },
  mutations: {
    setListUbs(state, list) {
      state.listUbs = list;
    },
    setUbsSelected(state, id) {
      state.ubsSelected = id;
    },
  },
  actions: {
    async fetchListUbs({ commit }, searchText) {
      const params = {
        busca: searchText,
      };
      const response = await http.get('/ubs/get2', { params });
      commit('setListUbs', response.data);
    },
  },
});
