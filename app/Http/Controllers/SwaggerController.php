<?php

namespace App\Http\Controllers;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         title="Laravel Swagger API",
 *         version="1.0.0",
 *         description="Auto-generated Swagger doc for Laravel API",
 *         @OA\Contact(
 *             email="dev@example.com"
 *         )
 *     ),
 *     @OA\Server(
 *         url="http://localhost:88",
 *         description="Local dev server"
 *     )
 * )
 * @OA\SecurityScheme(
 *     type="http",
 *     description="Use bearer token",
 *     name="Authorization",
 *     in="header",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth"
 * )
 */
class SwaggerController {}
