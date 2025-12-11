<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Kriteria;

class KriteriaApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_list()
    {
        Kriteria::factory()->create(['nama_kriteria' => 'Test A', 'cost_benefit' => 'benefit', 'bobot' => 1]);
        $resp = $this->getJson('/api/kriteria');
        $resp->assertStatus(200)->assertJsonStructure([['id_kriteria','nama_kriteria','cost_benefit','bobot']]);
    }

    public function test_store_creates_item()
    {
        $payload = ['nama_kriteria' => 'Baru', 'cost_benefit' => 'cost', 'bobot' => 2];
        $resp = $this->postJson('/api/kriteria', $payload);
        $resp->assertStatus(201)->assertJsonFragment(['nama_kriteria' => 'Baru']);
        $this->assertDatabaseHas('kriteria', ['nama_kriteria' => 'Baru']);
    }
}
