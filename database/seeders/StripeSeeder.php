<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StripeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stripe_configurations')->insert([
            [
                'name' => 'Stripe Test Keys',
                'stripe_key' => 'eyJpdiI6Ik94SmZ1SlU5T3I3LzYrS0ZDaitjUFE9PSIsInZhbHVlIjoiQUM5MGZaVkJhZkhYcU1rOFZINWR1NUpia0RVOEVaTmYraXBPZnU0bmZhdTdlSjB4Vk1YRHhYd010ZjFiSDJKcDdmZGdsRzIvdU16eUppYXlVZVF5V2pqZktZSG5wcnQvZVNmaElJRXI2N2xzZk5PNnNzNDhDTXBkQm9sVGZXRmE2azZqR1ZCWkFldEtiSWpXWlIweG1nPT0iLCJtYWMiOiIzNmZhMGJjNWZhZjgwNTFkZmU2NjhhODkxMmU0MmI5OGY0YzY3ZjFjMGNjYTc5ZjBkN2EyYWVlYzhkYzYxZDMwIiwidGFnIjoiIn0=',
                'stripe_secret' => 'eyJpdiI6IkRBVUlFdW9RNjhnZ3FSaGN6cEJmSkE9PSIsInZhbHVlIjoiVmo3L1F1Q0s0ZnhybGYxSWpaWTJUMHQxNGRoMFJDbHFFZGhLaUlMY1Bya1VBRWNkL0RrQnlxTEtlWnpoVGNrVTFQaWxraXJkOFdESE1CSzRGWkxBdzBzTnp3WE9kdEsycTF4WXpDc2oveDNOc296Rkk4ZzBXN293OFN6VHBwcnA1UGYwVGk0WS9RTktTdlNJWWVuZXZnPT0iLCJtYWMiOiIwMjY4MTUzZGE4MGZiYmJjYTJiZDYyNTdjOGUyMTFmYWEyYTc3YTA4OTcxZmIyYjNjNTc3Y2EyYjUyMzI2MWM1IiwidGFnIjoiIn0=',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
