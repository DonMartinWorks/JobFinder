<?php

namespace Database\Factories;


use App\Models\User;
use App\Enums\JobType;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Work>
 */
class WorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->jobTitle();

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraphs(2, true),
            'salary' => $this->faker->numberBetween(100000, 300000),
            'tags' => implode(', ', $this->faker->words(3)),
            'job_type' => $this->faker->randomElement(JobType::cases())->value,
            'remote' => $this->faker->boolean(),
            'requirements' => $this->faker->paragraphs(2, true),
            'benefits' => $this->faker->sentences(3, true),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'state' => $this->faker->state(),
            'zipcode' => $this->faker->postcode(),
            'contact_email' => $this->faker->unique()->email(),
            'contact_phone' => $this->faker->unique()->phoneNumber(),
            'company_name' => $this->faker->unique()->company(),
            'company_description' => $this->faker->unique()->paragraphs(2, true),
            'company_logo' => $this->faker->imageUrl(200, 200, 'company', true, 'logo'),
            'company_website' => $this->faker->unique()->url(),
            'status' => $this->faker->boolean(80),
        ];
    }
}
