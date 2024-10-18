<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = [
            // Amazonas
            ['id' => 1, 'name' => 'Leticia', 'estado_id' => 1],
            ['id' => 2, 'name' => 'El Encanto', 'estado_id' => 1],
            ['id' => 3, 'name' => 'La Chorrera', 'estado_id' => 1],
            ['id' => 4, 'name' => 'La Pedrera', 'estado_id' => 1],
            ['id' => 5, 'name' => 'Puerto Nariño', 'estado_id' => 1],
            ['id' => 6, 'name' => 'Tarapacá', 'estado_id' => 1],

            // Antioquia
            ['id' => 7, 'name' => 'Medellín', 'estado_id' => 2],
            ['id' => 8, 'name' => 'Bello', 'estado_id' => 2],
            ['id' => 9, 'name' => 'Itagüí', 'estado_id' => 2],
            ['id' => 10, 'name' => 'Envigado', 'estado_id' => 2],
            ['id' => 11, 'name' => 'Apartadó', 'estado_id' => 2],
            ['id' => 12, 'name' => 'Bello', 'estado_id' => 2],
            ['id' => 13, 'name' => 'Caucasia', 'estado_id' => 2],
            ['id' => 14, 'name' => 'Turbo', 'estado_id' => 2],
            ['id' => 15, 'name' => 'Sonsón', 'estado_id' => 2],
            ['id' => 16, 'name' => 'Rionegro', 'estado_id' => 2],
            ['id' => 17, 'name' => 'La Ceja', 'estado_id' => 2],
            ['id' => 18, 'name' => 'La Estrella', 'estado_id' => 2],
            ['id' => 19, 'name' => 'Carmen de Viboral', 'estado_id' => 2],
            ['id' => 20, 'name' => 'Briceno', 'estado_id' => 2],
            ['id' => 21, 'name' => 'Guatapé', 'estado_id' => 2],
            ['id' => 22, 'name' => 'Jardín', 'estado_id' => 2],
            ['id' => 23, 'name' => 'Sopetrán', 'estado_id' => 2],
            ['id' => 24, 'name' => 'San Pedro de los Milagros', 'estado_id' => 2],
            ['id' => 25, 'name' => 'Valparaíso', 'estado_id' => 2],
            ['id' => 26, 'name' => 'San Carlos', 'estado_id' => 2],
            ['id' => 27, 'name' => 'San Francisco', 'estado_id' => 2],
            ['id' => 28, 'name' => 'Yarumal', 'estado_id' => 2],
            ['id' => 29, 'name' => 'Sabaneta', 'estado_id' => 2],
            ['id' => 30, 'name' => 'Tarazá', 'estado_id' => 2],
            ['id' => 31, 'name' => 'Bello', 'estado_id' => 2],
            ['id' => 32, 'name' => 'Cáceres', 'estado_id' => 2],
            ['id' => 33, 'name' => 'Peque', 'estado_id' => 2],
            ['id' => 34, 'name' => 'San Roque', 'estado_id' => 2],
            ['id' => 35, 'name' => 'Valdivia', 'estado_id' => 2],
            ['id' => 36, 'name' => 'Briceño', 'estado_id' => 2],

            // Atlántico
            ['id' => 37, 'name' => 'Barranquilla', 'estado_id' => 3],
            ['id' => 38, 'name' => 'Baranoa', 'estado_id' => 3],
            ['id' => 39, 'name' => 'Campo de la Cruz', 'estado_id' => 3],
            ['id' => 40, 'name' => 'Candelaria', 'estado_id' => 3],
            ['id' => 41, 'name' => 'Galapa', 'estado_id' => 3],
            ['id' => 42, 'name' => 'Juan de Acosta', 'estado_id' => 3],
            ['id' => 43, 'name' => 'Luruaco', 'estado_id' => 3],
            ['id' => 44, 'name' => 'Malambo', 'estado_id' => 3],
            ['id' => 45, 'name' => 'Manatí', 'estado_id' => 3],
            ['id' => 46, 'name' => 'Palmar de Varela', 'estado_id' => 3],
            ['id' => 47, 'name' => 'Puerto Colombia', 'estado_id' => 3],
            ['id' => 48, 'name' => 'Sabanalarga', 'estado_id' => 3],
            ['id' => 49, 'name' => 'Sabanagrande', 'estado_id' => 3],
            ['id' => 50, 'name' => 'Santa Lucía', 'estado_id' => 3],
            ['id' => 51, 'name' => 'Santo Tomás', 'estado_id' => 3],
            ['id' => 52, 'name' => 'Soledad', 'estado_id' => 3],
            ['id' => 53, 'name' => 'Tubará', 'estado_id' => 3],
            ['id' => 54, 'name' => 'Usiacurí', 'estado_id' => 3],
            // ... Agrega todos los municipios de Atlántico aquí

            // Bolívar
            ['id' => 55, 'name' => 'Achí', 'estado_id' => 4],
            ['id' => 56, 'name' => 'Altos del Rosario', 'estado_id' => 4],
            ['id' => 57, 'name' => 'Barranco de Loba', 'estado_id' => 4],
            ['id' => 58, 'name' => 'Bolívar', 'estado_id' => 4],
            ['id' => 59, 'name' => 'Cartagena', 'estado_id' => 4],
            ['id' => 60, 'name' => 'Cimitarra', 'estado_id' => 4],
            ['id' => 61, 'name' => 'Córdoba', 'estado_id' => 4],
            ['id' => 62, 'name' => 'El Guamo', 'estado_id' => 4],
            ['id' => 63, 'name' => 'El Peñón', 'estado_id' => 4],
            ['id' => 64, 'name' => 'Magangué', 'estado_id' => 4],
            ['id' => 65, 'name' => 'María la Baja', 'estado_id' => 4],
            ['id' => 66, 'name' => 'Morales', 'estado_id' => 4],
            ['id' => 67, 'name' => 'San Jacinto', 'estado_id' => 4],
            ['id' => 68, 'name' => 'San Juan Nepomuceno', 'estado_id' => 4],
            ['id' => 69, 'name' => 'Santa Rosa del Sur', 'estado_id' => 4],
            ['id' => 70, 'name' => 'Simití', 'estado_id' => 4],
            ['id' => 71, 'name' => 'Turbo', 'estado_id' => 4],
            ['id' => 72, 'name' => 'Zambrano', 'estado_id' => 4],
            // ... Agrega todos los municipios de Bolívar aquí

            // Boyacá
            ['id' => 73, 'name' => 'Aquitania', 'estado_id' => 5],
            ['id' => 74, 'name' => 'Arcabuco', 'estado_id' => 5],
            ['id' => 75, 'name' => 'Belén', 'estado_id' => 5],
            ['id' => 76, 'name' => 'Berbeo', 'estado_id' => 5],
            ['id' => 77, 'name' => 'Boyacá', 'estado_id' => 5],
            ['id' => 78, 'name' => 'Briceño', 'estado_id' => 5],
            ['id' => 79, 'name' => 'Buenavista', 'estado_id' => 5],
            ['id' => 80, 'name' => 'Busbanza', 'estado_id' => 5],
            ['id' => 81, 'name' => 'Caldas', 'estado_id' => 5],
            ['id' => 82, 'name' => 'Campohermoso', 'estado_id' => 5],
            ['id' => 83, 'name' => 'Cerinza', 'estado_id' => 5],
            ['id' => 84, 'name' => 'Chiquinquirá', 'estado_id' => 5],
            ['id' => 85, 'name' => 'Chiscas', 'estado_id' => 5],
            ['id' => 86, 'name' => 'Chivatá', 'estado_id' => 5],
            ['id' => 87, 'name' => 'Cómbita', 'estado_id' => 5],
            ['id' => 88, 'name' => 'Coper', 'estado_id' => 5],
            ['id' => 89, 'name' => 'Corrales', 'estado_id' => 5],
            ['id' => 90, 'name' => 'Covarachía', 'estado_id' => 5],
            ['id' => 91, 'name' => 'Duitama', 'estado_id' => 5],
            ['id' => 92, 'name' => 'El Cocuy', 'estado_id' => 5],
            ['id' => 93, 'name' => 'El Espino', 'estado_id' => 5],
            ['id' => 94, 'name' => 'Firavitoba', 'estado_id' => 5],
            ['id' => 95, 'name' => 'Floresta', 'estado_id' => 5],
            ['id' => 96, 'name' => 'Garagoa', 'estado_id' => 5],
            ['id' => 97, 'name' => 'Gachantivá', 'estado_id' => 5],
            ['id' => 98, 'name' => 'Iza', 'estado_id' => 5],
            ['id' => 99, 'name' => 'Jerez', 'estado_id' => 5],
            ['id' => 100, 'name' => 'La Capilla', 'estado_id' => 5],
            ['id' => 101, 'name' => 'La Uvita', 'estado_id' => 5],
            ['id' => 102, 'name' => 'Miraflores', 'estado_id' => 5],
            ['id' => 103, 'name' => 'Monguí', 'estado_id' => 5],
            ['id' => 104, 'name' => 'Nobsa', 'estado_id' => 5],
            ['id' => 105, 'name' => 'Pajarito', 'estado_id' => 5],
            ['id' => 106, 'name' => 'Pauna', 'estado_id' => 5],
            ['id' => 107, 'name' => 'Pesca', 'estado_id' => 5],
            ['id' => 108, 'name' => 'Puente Nacional', 'estado_id' => 5],
            ['id' => 109, 'name' => 'Quípama', 'estado_id' => 5],
            ['id' => 110, 'name' => 'Ramiriquí', 'estado_id' => 5],
            ['id' => 111, 'name' => 'Ráquira', 'estado_id' => 5],
            ['id' => 112, 'name' => 'Samacá', 'estado_id' => 5],
            ['id' => 113, 'name' => 'San Eduardo', 'estado_id' => 5],
            ['id' => 114, 'name' => 'San Mateo', 'estado_id' => 5],
            ['id' => 115, 'name' => 'San Pablo de Borbur', 'estado_id' => 5],
            ['id' => 116, 'name' => 'Santa María', 'estado_id' => 5],
            ['id' => 117, 'name' => 'Santa Rosa de Viterbo', 'estado_id' => 5],
            ['id' => 118, 'name' => 'Siachoque', 'estado_id' => 5],
            ['id' => 119, 'name' => 'Socotá', 'estado_id' => 5],
            ['id' => 120, 'name' => 'Soracá', 'estado_id' => 5],
            ['id' => 121, 'name' => 'Tuta', 'estado_id' => 5],
            ['id' => 122, 'name' => 'Tunja', 'estado_id' => 5],
            ['id' => 123, 'name' => 'Ventaquemada', 'estado_id' => 5],
            ['id' => 124, 'name' => 'Villa de Leyva', 'estado_id' => 5],
            ['id' => 125, 'name' => 'Zetaquira', 'estado_id' => 5],
            // ... Agrega todos los municipios de Boyacá aquí

            // Caldas
            ['id' => 126, 'name' => 'Aguadas', 'estado_id' => 6],
            ['id' => 127, 'name' => 'Anserma', 'estado_id' => 6],
            ['id' => 128, 'name' => 'Aranzazu', 'estado_id' => 6],
            ['id' => 129, 'name' => 'Belalcázar', 'estado_id' => 6],
            ['id' => 130, 'name' => 'Chinchiná', 'estado_id' => 6],
            ['id' => 131, 'name' => 'Manizales', 'estado_id' => 6],
            ['id' => 132, 'name' => 'Neira', 'estado_id' => 6],
            ['id' => 133, 'name' => 'Pacora', 'estado_id' => 6],
            ['id' => 134, 'name' => 'Palestina', 'estado_id' => 6],
            ['id' => 135, 'name' => 'Riosucio', 'estado_id' => 6],
            ['id' => 136, 'name' => 'Risaralda', 'estado_id' => 6],
            ['id' => 137, 'name' => 'Salamina', 'estado_id' => 6],
            ['id' => 138, 'name' => 'San José', 'estado_id' => 6],
            ['id' => 139, 'name' => 'Santa Rosa de Cabal', 'estado_id' => 6],
            ['id' => 140, 'name' => 'Villamaría', 'estado_id' => 6],
            ['id' => 141, 'name' => 'Viterbo', 'estado_id' => 6],
            // ... Agrega todos los municipios de Caldas aquí

            // Caquetá
            ['id' => 142, 'name' => 'Alcobias', 'estado_id' => 7],
            ['id' => 143, 'name' => 'Cartagena del Chairá', 'estado_id' => 7],
            ['id' => 144, 'name' => 'El Paujil', 'estado_id' => 7],
            ['id' => 145, 'name' => 'Florencia', 'estado_id' => 7],
            ['id' => 146, 'name' => 'La Montañita', 'estado_id' => 7],
            ['id' => 147, 'name' => 'Morelia', 'estado_id' => 7],
            ['id' => 148, 'name' => 'Puerto Rico', 'estado_id' => 7],
            ['id' => 149, 'name' => 'San Vicente del Caguán', 'estado_id' => 7],
            ['id' => 150, 'name' => 'Solano', 'estado_id' => 7],
            ['id' => 151, 'name' => 'Valparaíso', 'estado_id' => 7],
            // ... Agrega todos los municipios de Caquetá aquí

            // Casanare
            ['id' => 152, 'name' => 'Aguazul', 'estado_id' => 8],
            ['id' => 153, 'name' => 'Chámeza', 'estado_id' => 8],
            ['id' => 154, 'name' => 'Hato Corozal', 'estado_id' => 8],
            ['id' => 155, 'name' => 'La Salina', 'estado_id' => 8],
            ['id' => 156, 'name' => 'Maní', 'estado_id' => 8],
            ['id' => 157, 'name' => 'Monterrey', 'estado_id' => 8],
            ['id' => 158, 'name' => 'Nunchía', 'estado_id' => 8],
            ['id' => 159, 'name' => 'Paz de Ariporo', 'estado_id' => 8],
            ['id' => 160, 'name' => 'Pore', 'estado_id' => 8],
            ['id' => 161, 'name' => 'Recetor', 'estado_id' => 8],
            ['id' => 162, 'name' => 'Sácama', 'estado_id' => 8],
            ['id' => 163, 'name' => 'San Luis de Palenque', 'estado_id' => 8],
            ['id' => 164, 'name' => 'Tauramena', 'estado_id' => 8],
            ['id' => 165, 'name' => 'Trinidad', 'estado_id' => 8],
            ['id' => 166, 'name' => 'Villanueva', 'estado_id' => 8],
            // ... Agrega todos los municipios de Casanare aquí

            // Cauca
            ['id' => 167, 'name' => 'Almaguer', 'estado_id' => 9],
            ['id' => 168, 'name' => 'Argelia', 'estado_id' => 9],
            ['id' => 169, 'name' => 'Balboa', 'estado_id' => 9],
            ['id' => 170, 'name' => 'Bolívar', 'estado_id' => 9],
            ['id' => 171, 'name' => 'Buenos Aires', 'estado_id' => 9],
            ['id' => 172, 'name' => 'Cajibío', 'estado_id' => 9],
            ['id' => 173, 'name' => 'Caloto', 'estado_id' => 9],
            ['id' => 174, 'name' => 'El Tambo', 'estado_id' => 9],
            ['id' => 175, 'name' => 'Florencia', 'estado_id' => 9],
            ['id' => 176, 'name' => 'Guachené', 'estado_id' => 9],
            ['id' => 177, 'name' => 'Jambaló', 'estado_id' => 9],
            ['id' => 178, 'name' => 'La Sierra', 'estado_id' => 9],
            ['id' => 179, 'name' => 'La Vega', 'estado_id' => 9],
            ['id' => 180, 'name' => 'López de Micay', 'estado_id' => 9],
            ['id' => 181, 'name' => 'Mercaderes', 'estado_id' => 9],
            ['id' => 182, 'name' => 'Morales', 'estado_id' => 9],
            ['id' => 183, 'name' => 'Patía', 'estado_id' => 9],
            ['id' => 184, 'name' => 'Piendamó', 'estado_id' => 9],
            ['id' => 185, 'name' => 'Popayán', 'estado_id' => 9],
            ['id' => 186, 'name' => 'Puerto Tejada', 'estado_id' => 9],
            ['id' => 187, 'name' => 'Puracé', 'estado_id' => 9],
            ['id' => 188, 'name' => 'San Sebastián', 'estado_id' => 9],
            ['id' => 189, 'name' => 'Santander de Quilichao', 'estado_id' => 9],
            ['id' => 190, 'name' => 'Silvia', 'estado_id' => 9],
            ['id' => 191, 'name' => 'Suárez', 'estado_id' => 9],
            ['id' => 192, 'name' => 'Totoró', 'estado_id' => 9],
            ['id' => 193, 'name' => 'Villa Rica', 'estado_id' => 9],
            // ... Agrega todos los municipios de Cauca aquí

            // Cesar
            ['id' => 194, 'name' => 'Aguachica', 'estado_id' => 10],
            ['id' => 195, 'name' => 'Astrea', 'estado_id' => 10],
            ['id' => 196, 'name' => 'Bosconia', 'estado_id' => 10],
            ['id' => 197, 'name' => 'Chiriguaná', 'estado_id' => 10],
            ['id' => 198, 'name' => 'Curumaní', 'estado_id' => 10],
            ['id' => 199, 'name' => 'El Copey', 'estado_id' => 10],
            ['id' => 200, 'name' => 'El Paso', 'estado_id' => 10],
            ['id' => 201, 'name' => 'Gamarra', 'estado_id' => 10],
            ['id' => 202, 'name' => 'La Gloria', 'estado_id' => 10],
            ['id' => 203, 'name' => 'La Jagua de Ibirico', 'estado_id' => 10],
            ['id' => 204, 'name' => 'Valledupar', 'estado_id' => 10],
            ['id' => 205, 'name' => 'Manaure', 'estado_id' => 10],
            ['id' => 206, 'name' => 'Pueblo Bello', 'estado_id' => 10],
            ['id' => 207, 'name' => 'San Alberto', 'estado_id' => 10],
            ['id' => 208, 'name' => 'San Diego', 'estado_id' => 10],
            ['id' => 209, 'name' => 'Tamalameque', 'estado_id' => 10],
            // ... Agrega todos los municipios de Cesar aquí



            
            // Chocó
            ['id' => 210, 'name' => 'Acandí', 'estado_id' => 11],
            ['id' => 211, 'name' => 'Alto Baudó', 'estado_id' => 11],
            ['id' => 212, 'name' => 'Atrato', 'estado_id' => 11],
            ['id' => 213, 'name' => 'Bahía Solano', 'estado_id' => 11],
            ['id' => 214, 'name' => 'Bagadó', 'estado_id' => 11],
            ['id' => 215, 'name' => 'Baudó', 'estado_id' => 11],
            ['id' => 216, 'name' => 'Bojayá', 'estado_id' => 11],
            ['id' => 217, 'name' => 'Carmen del Darién', 'estado_id' => 11],
            ['id' => 218, 'name' => 'Condoto', 'estado_id' => 11],
            ['id' => 219, 'name' => 'El Cantón del San Pablo', 'estado_id' => 11],
            ['id' => 220, 'name' => 'Istmina', 'estado_id' => 11],
            ['id' => 221, 'name' => 'Juradó', 'estado_id' => 11],
            ['id' => 222, 'name' => 'Litoral del San Juan', 'estado_id' => 11],
            ['id' => 223, 'name' => 'Novita', 'estado_id' => 11],
            ['id' => 224, 'name' => 'Quibdó', 'estado_id' => 11],
            ['id' => 225, 'name' => 'Río Quito', 'estado_id' => 11],
            ['id' => 226, 'name' => 'Riosucio', 'estado_id' => 11],
            ['id' => 227, 'name' => 'San José del Palmar', 'estado_id' => 11],
            ['id' => 228, 'name' => 'Sipí', 'estado_id' => 11],
            ['id' => 229, 'name' => 'Tadó', 'estado_id' => 11],
            ['id' => 230, 'name' => 'Unión Panamericana', 'estado_id' => 11],
            // ... Agrega todos los municipios de Chocó aquí

            // Córdoba
            ['id' => 231, 'name' => 'Ayapel', 'estado_id' => 12],
            ['id' => 232, 'name' => 'Cereté', 'estado_id' => 12],
            ['id' => 233, 'name' => 'Chima', 'estado_id' => 12],
            ['id' => 234, 'name' => 'Ciénaga de Oro', 'estado_id' => 12],
            ['id' => 235, 'name' => 'Córdoba', 'estado_id' => 12],
            ['id' => 236, 'name' => 'Lorica', 'estado_id' => 12],
            ['id' => 237, 'name' => 'Montería', 'estado_id' => 12],
            ['id' => 238, 'name' => 'Moñitos', 'estado_id' => 12],
            ['id' => 239, 'name' => 'Planeta Rica', 'estado_id' => 12],
            ['id' => 240, 'name' => 'Puerto Escondido', 'estado_id' => 12],
            ['id' => 241, 'name' => 'Sahagún', 'estado_id' => 12],
            ['id' => 242, 'name' => 'San Andrés Sotavento', 'estado_id' => 12],
            ['id' => 243, 'name' => 'San Antero', 'estado_id' => 12],
            ['id' => 244, 'name' => 'San Pelayo', 'estado_id' => 12],
            ['id' => 245, 'name' => 'Tierralta', 'estado_id' => 12],
            ['id' => 246, 'name' => 'Valencia', 'estado_id' => 12],
            // ... Agrega todos los municipios de Córdoba aquí

            // Cundinamarca
            ['id' => 247, 'name' => 'Apulo', 'estado_id' => 13],
            ['id' => 248, 'name' => 'Bituima', 'estado_id' => 13],
            ['id' => 249, 'name' => 'Cáqueza', 'estado_id' => 13],
            ['id' => 250, 'name' => 'Cajicá', 'estado_id' => 13],
            ['id' => 251, 'name' => 'Caparrapí', 'estado_id' => 13],
            ['id' => 252, 'name' => 'Chocontá', 'estado_id' => 13],
            ['id' => 253, 'name' => 'Chía', 'estado_id' => 13],
            ['id' => 254, 'name' => 'Cogua', 'estado_id' => 13],
            ['id' => 255, 'name' => 'Cota', 'estado_id' => 13],
            ['id' => 256, 'name' => 'El Rosal', 'estado_id' => 13],
            ['id' => 257, 'name' => 'Facatativá', 'estado_id' => 13],
            ['id' => 258, 'name' => 'Fúquene', 'estado_id' => 13],
            ['id' => 259, 'name' => 'Fusagasugá', 'estado_id' => 13],
            ['id' => 260, 'name' => 'Girardot', 'estado_id' => 13],
            ['id' => 261, 'name' => 'La Calera', 'estado_id' => 13],
            ['id' => 262, 'name' => 'La Mesa', 'estado_id' => 13],
            ['id' => 263, 'name' => 'Madrid', 'estado_id' => 13],
            ['id' => 264, 'name' => 'Mosquera', 'estado_id' => 13],
            ['id' => 265, 'name' => 'Nemocón', 'estado_id' => 13],
            ['id' => 266, 'name' => 'Nilo', 'estado_id' => 13],
            ['id' => 267, 'name' => 'Nocaima', 'estado_id' => 13],
            ['id' => 268, 'name' => 'Pacho', 'estado_id' => 13],
            ['id' => 269, 'name' => 'La Palma', 'estado_id' => 13],
            ['id' => 270, 'name' => 'Quetame', 'estado_id' => 13],
            ['id' => 271, 'name' => 'San Antonio del Tequendama', 'estado_id' => 13],
            ['id' => 272, 'name' => 'San Francisco', 'estado_id' => 13],
            ['id' => 273, 'name' => 'Sopó', 'estado_id' => 13],
            ['id' => 274, 'name' => 'Subachoque', 'estado_id' => 13],
            ['id' => 275, 'name' => 'Tabio', 'estado_id' => 13],
            ['id' => 276, 'name' => 'Tenjo', 'estado_id' => 13],
            ['id' => 277, 'name' => 'La Vega', 'estado_id' => 13],
            ['id' => 278, 'name' => 'Villeta', 'estado_id' => 13],
            ['id' => 279, 'name' => 'Zipaquira', 'estado_id' => 13],
            // ... Agrega todos los municipios de Cundinamarca aquí

            // Guaviare
            ['id' => 280, 'name' => 'Calamar', 'estado_id' => 14],
            ['id' => 281, 'name' => 'El Retorno', 'estado_id' => 14],
            ['id' => 282, 'name' => 'Miraflores', 'estado_id' => 14],
            ['id' => 283, 'name' => 'San José del Guaviare', 'estado_id' => 14],
            // ... Agrega todos los municipios de Guaviare aquí

            // Guainía
            ['id' => 284, 'name' => 'Inírida', 'estado_id' => 15],
            ['id' => 285, 'name' => 'Barranco Minas', 'estado_id' => 15],
            ['id' => 286, 'name' => 'San Felipe', 'estado_id' => 15],
            ['id' => 287, 'name' => 'La Guadalupe', 'estado_id' => 15],
            // ... Agrega todos los municipios de Guainía aquí

            // Huila
            ['id' => 288, 'name' => 'Acevedo', 'estado_id' => 16],
            ['id' => 289, 'name' => 'Agrado', 'estado_id' => 16],
            ['id' => 290, 'name' => 'Algeciras', 'estado_id' => 16],
            ['id' => 291, 'name' => 'Aipe', 'estado_id' => 16],
            ['id' => 292, 'name' => 'Neiva', 'estado_id' => 16],
            ['id' => 293, 'name' => 'Garzón', 'estado_id' => 16],
            ['id' => 294, 'name' => 'Hobo', 'estado_id' => 16],
            ['id' => 295, 'name' => 'La Argentina', 'estado_id' => 16],
            ['id' => 296, 'name' => 'La Plata', 'estado_id' => 16],
            ['id' => 297, 'name' => 'Pitalito', 'estado_id' => 16],
            ['id' => 298, 'name' => 'Rivera', 'estado_id' => 16],
            ['id' => 299, 'name' => 'San Agustín', 'estado_id' => 16],
            ['id' => 300, 'name' => 'San José de Isnos', 'estado_id' => 16],
            ['id' => 301, 'name' => 'Tesalia', 'estado_id' => 16],
            ['id' => 302, 'name' => 'Timaná', 'estado_id' => 16],
            ['id' => 303, 'name' => 'Yaguará', 'estado_id' => 16],
            // ... Agrega todos los municipios de Huila aquí

            // La Guajira
            ['id' => 304, 'name' => 'Albania', 'estado_id' => 17],
            ['id' => 305, 'name' => 'Barrancas', 'estado_id' => 17],
            ['id' => 306, 'name' => 'Dibulla', 'estado_id' => 17],
            ['id' => 307, 'name' => 'Distracción', 'estado_id' => 17],
            ['id' => 308, 'name' => 'El Molino', 'estado_id' => 17],
            ['id' => 309, 'name' => 'Fonseca', 'estado_id' => 17],
            ['id' => 310, 'name' => 'La Jagua del Ibirico', 'estado_id' => 17],
            ['id' => 311, 'name' => 'Maicao', 'estado_id' => 17],
            ['id' => 312, 'name' => 'Riohacha', 'estado_id' => 17],
            ['id' => 313, 'name' => 'San Juan del Cesar', 'estado_id' => 17],
            ['id' => 314, 'name' => 'Uribia', 'estado_id' => 17],
            ['id' => 315, 'name' => 'Villanueva', 'estado_id' => 17],
            // ... Agrega todos los municipios de La Guajira aquí

            // Magdalena
            ['id' => 316, 'name' => 'Alameda', 'estado_id' => 18],
            ['id' => 317, 'name' => 'Aracataca', 'estado_id' => 18],
            ['id' => 318, 'name' => 'Ciénaga', 'estado_id' => 18],
            ['id' => 319, 'name' => 'El Retén', 'estado_id' => 18],
            ['id' => 320, 'name' => 'Fundación', 'estado_id' => 18],
            ['id' => 321, 'name' => 'Santa Marta', 'estado_id' => 18],
            ['id' => 322, 'name' => 'Sitio Nuevo', 'estado_id' => 18],
            ['id' => 323, 'name' => 'Zona Bananera', 'estado_id' => 18],
            // ... Agrega todos los municipios de Magdalena aquí

            // Meta
            ['id' => 324, 'name' => 'Acacías', 'estado_id' => 19],
            ['id' => 325, 'name' => 'Barranca de Upía', 'estado_id' => 19],
            ['id' => 326, 'name' => 'Castilla La Nueva', 'estado_id' => 19],
            ['id' => 327, 'name' => 'Cubarral', 'estado_id' => 19],
            ['id' => 328, 'name' => 'El Calvario', 'estado_id' => 19],
            ['id' => 329, 'name' => 'Granada', 'estado_id' => 19],
            ['id' => 330, 'name' => 'La Macarena', 'estado_id' => 19],
            ['id' => 331, 'name' => 'La Uribe', 'estado_id' => 19],
            ['id' => 332, 'name' => 'Mesetas', 'estado_id' => 19],
            ['id' => 333, 'name' => 'Puerto Concordia', 'estado_id' => 19],
            ['id' => 334, 'name' => 'Puerto Gaitán', 'estado_id' => 19],
            ['id' => 335, 'name' => 'Puerto López', 'estado_id' => 19],
            ['id' => 336, 'name' => 'Restrepo', 'estado_id' => 19],
            ['id' => 337, 'name' => 'Villavicencio', 'estado_id' => 19],
            ['id' => 338, 'name' => 'Villanueva', 'estado_id' => 19],
            // ... Agrega todos los municipios de Meta aquí

            // Nariño
            ['id' => 339, 'name' => 'Ancuyá', 'estado_id' => 20],
            ['id' => 340, 'name' => 'Arboleda', 'estado_id' => 20],
            ['id' => 341, 'name' => 'Barbacoas', 'estado_id' => 20],
            ['id' => 342, 'name' => 'Belén', 'estado_id' => 20],
            ['id' => 343, 'name' => 'Buesaco', 'estado_id' => 20],
            ['id' => 344, 'name' => 'Chocontá', 'estado_id' => 20],
            ['id' => 345, 'name' => 'El Peñol', 'estado_id' => 20],
            ['id' => 346, 'name' => 'El Tambo', 'estado_id' => 20],
            ['id' => 347, 'name' => 'La Unión', 'estado_id' => 20],
            ['id' => 348, 'name' => 'Linares', 'estado_id' => 20],
            ['id' => 349, 'name' => 'Pasto', 'estado_id' => 20],
            ['id' => 350, 'name' => 'Potosí', 'estado_id' => 20],
            ['id' => 351, 'name' => 'Sandoná', 'estado_id' => 20],
            ['id' => 352, 'name' => 'San Pablo', 'estado_id' => 20],
            ['id' => 353, 'name' => 'Túquerres', 'estado_id' => 20],
            ['id' => 354, 'name' => 'Yacuanquer', 'estado_id' => 20],
            // ... Agrega todos los municipios de Nariño aquí

            // Norte de Santander
            ['id' => 355, 'name' => 'Ábrego', 'estado_id' => 21],
            ['id' => 356, 'name' => 'Bucarasica', 'estado_id' => 21],
            ['id' => 357, 'name' => 'Cúcuta', 'estado_id' => 21],
            ['id' => 358, 'name' => 'El Zulia', 'estado_id' => 21],
            ['id' => 359, 'name' => 'Los Patios', 'estado_id' => 21],
            ['id' => 360, 'name' => 'Ocaña', 'estado_id' => 21],
            ['id' => 361, 'name' => 'Pamplona', 'estado_id' => 21],
            ['id' => 362, 'name' => 'Pamplonita', 'estado_id' => 21],
            ['id' => 363, 'name' => 'San Cayetano', 'estado_id' => 21],
            ['id' => 364, 'name' => 'Santiago', 'estado_id' => 21],
            ['id' => 365, 'name' => 'Villa del Rosario', 'estado_id' => 21],
            // ... Agrega todos los municipios de Norte de Santander aquí

            // Putumayo
            ['id' => 366, 'name' => 'Mocoa', 'estado_id' => 22],
            ['id' => 367, 'name' => 'Puerto Asís', 'estado_id' => 22],
            ['id' => 368, 'name' => 'Puerto Caicedo', 'estado_id' => 22],
            ['id' => 369, 'name' => 'Valle del Guamués', 'estado_id' => 22],
            ['id' => 370, 'name' => 'Villagarzón', 'estado_id' => 22],
            // ... Agrega todos los municipios de Putumayo aquí

            // Quindío
            ['id' => 371, 'name' => 'Armenia', 'estado_id' => 23],
            ['id' => 372, 'name' => 'Calarcá', 'estado_id' => 23],
            ['id' => 373, 'name' => 'Circasia', 'estado_id' => 23],
            ['id' => 374, 'name' => 'Córdoba', 'estado_id' => 23],
            ['id' => 375, 'name' => 'Filandia', 'estado_id' => 23],
            ['id' => 376, 'name' => 'La Tebaida', 'estado_id' => 23],
            ['id' => 377, 'name' => 'Montenegro', 'estado_id' => 23],
            ['id' => 378, 'name' => 'Salento', 'estado_id' => 23],
            // ... Agrega todos los municipios de Quindío aquí

            // Risaralda
            ['id' => 379, 'name' => 'Apía', 'estado_id' => 24],
            ['id' => 380, 'name' => 'Dosquebradas', 'estado_id' => 24],
            ['id' => 381, 'name' => 'La Celia', 'estado_id' => 24],
            ['id' => 382, 'name' => 'La Virginia', 'estado_id' => 24],
            ['id' => 383, 'name' => 'Pereira', 'estado_id' => 24],
            ['id' => 384, 'name' => 'Santa Rosa de Cabal', 'estado_id' => 24],
            ['id' => 385, 'name' => 'Santuario', 'estado_id' => 24],
            // ... Agrega todos los municipios de Risaralda aquí

            // San Andrés y Providencia
            ['id' => 386, 'name' => 'San Andrés', 'estado_id' => 25],
            ['id' => 387, 'name' => 'Providencia', 'estado_id' => 25],
            // ... Agrega todos los municipios de San Andrés y Providencia aquí

            // Santander
            ['id' => 388, 'name' => 'Bucaramanga', 'estado_id' => 26],
            ['id' => 389, 'name' => 'Barrancabermeja', 'estado_id' => 26],
            ['id' => 390, 'name' => 'Floridablanca', 'estado_id' => 26],
            ['id' => 391, 'name' => 'Girón', 'estado_id' => 26],
            ['id' => 392, 'name' => 'Piedecuesta', 'estado_id' => 26],
            ['id' => 393, 'name' => 'San Gil', 'estado_id' => 26],
            ['id' => 394, 'name' => 'Socorro', 'estado_id' => 26],
            ['id' => 395, 'name' => 'Valle de San José', 'estado_id' => 26],
            // ... Agrega todos los municipios de Santander aquí

            // Sucre
            ['id' => 396, 'name' => 'Sincelejo', 'estado_id' => 27],
            ['id' => 397, 'name' => 'Corozal', 'estado_id' => 27],
            ['id' => 398, 'name' => 'Los Palmitos', 'estado_id' => 27],
            ['id' => 399, 'name' => 'Morroa', 'estado_id' => 27],
            ['id' => 400, 'name' => 'San Marcos', 'estado_id' => 27],
            ['id' => 401, 'name' => 'San Onofre', 'estado_id' => 27],
            ['id' => 402, 'name' => 'Sucre', 'estado_id' => 27],
            // ... Agrega todos los municipios de Sucre aquí

            // Tolima
            ['id' => 403, 'name' => 'Ibagué', 'estado_id' => 28],
            ['id' => 404, 'name' => 'Espinal', 'estado_id' => 28],
            ['id' => 405, 'name' => 'El Espinal', 'estado_id' => 28],
            ['id' => 406, 'name' => 'Mariquita', 'estado_id' => 28],
            ['id' => 407, 'name' => 'Líbano', 'estado_id' => 28],
            ['id' => 408, 'name' => 'Melgar', 'estado_id' => 28],
            ['id' => 409, 'name' => 'Ortega', 'estado_id' => 28],
            ['id' => 410, 'name' => 'Riverton', 'estado_id' => 28],
            ['id' => 411, 'name' => 'Saldaña', 'estado_id' => 28],
            ['id' => 412, 'name' => 'San Luis', 'estado_id' => 28],
            ['id' => 413, 'name' => 'Tocaima', 'estado_id' => 28],
            ['id' => 414, 'name' => 'Venadillo', 'estado_id' => 28],
            // ... Agrega todos los municipios de Tolima aquí

            // Valle del Cauca
            ['id' => 415, 'name' => 'Cali', 'estado_id' => 29],
            ['id' => 416, 'name' => 'Buenaventura', 'estado_id' => 29],
            ['id' => 417, 'name' => 'Palmira', 'estado_id' => 29],
            ['id' => 418, 'name' => 'Tuluá', 'estado_id' => 29],
            ['id' => 419, 'name' => 'Cartago', 'estado_id' => 29],
            ['id' => 420, 'name' => 'Yumbo', 'estado_id' => 29],
            // ... Agrega todos los municipios de Valle del Cauca aquí

            // Vaupés
            ['id' => 421, 'name' => 'Mitú', 'estado_id' => 30],
            ['id' => 422, 'name' => 'Carurú', 'estado_id' => 30],
            ['id' => 423, 'name' => 'Taraira', 'estado_id' => 30],
            // ... Agrega todos los municipios de Vaupés aquí

            // Vichada
            ['id' => 424, 'name' => 'Puerto Carreño', 'estado_id' => 31],
            ['id' => 425, 'name' => 'Santa Rosalía', 'estado_id' => 31],
            ['id' => 426, 'name' => 'La Primavera', 'estado_id' => 31],
            // ... Agrega todos los municipios de Vichada aquí
        ];

        DB::table('municipios')->insert($municipios);
    }
}
