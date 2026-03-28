import axios from 'axios';

const api = axios.create({
  baseURL: '/api',
  headers: { 'X-Requested-With': 'XMLHttpRequest' },
});

export default {
  // Kriteria
  getKriteria() { return api.get('/kriteria'); },
  getKriteriaOne(id) { return api.get(`/kriteria/${id}`); },
  createKriteria(payload) { return api.post('/kriteria', payload); },
  updateKriteria(id, payload) { return api.put(`/kriteria/${id}`, payload); },
  deleteKriteria(id) { return api.delete(`/kriteria/${id}`); },

  // Kepentingan
  getKepentingan() { return api.get('/kepentingan'); },
  createKepentingan(payload) { return api.post('/kepentingan', payload); },

  // Perhitungan
  getPerhitungan() { return api.get('/perhitungan'); },
  createPerhitungan(payload) { return api.post('/perhitungan', payload); },

  // MkPlhn
  getMkPlhn() { return api.get('/mk-plhn'); },
};
