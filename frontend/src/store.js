import Vue from 'vue';
import Vuex from 'vuex';

import http from '@/config/http';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    listUbs: [],
  },
  mutations: {
    setListUbs(state, list) {
      state.listUbs = list;
    },
  },
  actions: {
    async fetchListUbs({ commit }, searchText) {
      const params = {
        busca: searchText,
      };
      const response = await http.get('/ubs', { params });
      commit('setListUbs', response.data);
    },
  },
});
