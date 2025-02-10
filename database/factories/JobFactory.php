<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     public function definition(): array
     {
        $jobs = [
            [
                'title' => 'Software Engineer',
                'company' => 'Google',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Sebagai Software Engineer di Google, Anda akan bertanggung jawab dalam merancang, mengembangkan, dan mengimplementasikan sistem perangkat lunak yang efisien dan scalable. Anda akan bekerja dalam tim yang dinamis dan inovatif untuk menciptakan solusi yang berdampak global.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Mengembangkan dan mengoptimalkan kode untuk aplikasi berbasis web dan mobile.</li>
                    <li>Bekerja dengan tim lintas fungsi untuk menerjemahkan kebutuhan bisnis menjadi solusi teknis.</li>
                    <li>Menulis kode yang bersih, efisien, dan dapat diuji.</li>
                    <li>Mengatasi bug dan meningkatkan performa sistem.</li>
                    <li>Menerapkan prinsip DevOps untuk deployment yang lebih efisien.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Gelar Sarjana di bidang Ilmu Komputer atau pengalaman setara.</li>
                    <li>Pengalaman dengan bahasa pemrograman seperti Python, JavaScript, atau Go.</li>
                    <li>Pemahaman mendalam tentang struktur data dan algoritma.</li>
                    <li>Pengalaman dalam pengembangan API RESTful dan arsitektur berbasis microservices.</li>
                    <li>Kemampuan analisis dan problem-solving yang baik.</li>
                    <li>Mampu bekerja dalam tim dan berkomunikasi secara efektif.</li>
                </ul><br>",
                'salarymin' => 15000000,
                'salarymax' => 30000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Data Analyst',
                'company' => 'Microsoft',
                'location' => 'Bandung',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Kami mencari Data Analyst yang berpengalaman untuk membantu tim dalam mengolah dan menganalisis data guna mendukung pengambilan keputusan strategis.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Mengumpulkan dan membersihkan data dari berbagai sumber.</li>
                    <li>Melakukan analisis statistik dan menghasilkan insight dari data yang tersedia.</li>
                    <li>Menyajikan laporan dalam bentuk visualisasi data yang mudah dipahami.</li>
                    <li>Berkomunikasi dengan tim bisnis untuk memahami kebutuhan analisis data.</li>
                    <li>Mengembangkan dan mengoptimalkan dashboard menggunakan alat seperti Power BI atau Tableau.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Minimal S1 di bidang Statistika, Matematika, Ilmu Komputer, atau bidang terkait.</li>
                    <li>Pengalaman dalam analisis data dan penggunaan SQL, Python, atau R.</li>
                    <li>Kemampuan visualisasi data dengan alat seperti Tableau atau Power BI.</li>
                    <li>Pemahaman dasar tentang machine learning menjadi nilai tambah.</li>
                    <li>Komunikatif dan mampu bekerja dalam tim.</li>
                </ul><br>",
                'salarymin' => 12000000,
                'salarymax' => 25000000,
                'type' => 'Remote',
            ],
            [
                'title' => 'Project Manager',
                'company' => 'Facebook',
                'location' => 'Surabaya',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Sebagai Project Manager, Anda akan memimpin tim dalam mengelola dan menyelesaikan proyek dengan efisien serta memastikan pencapaian target yang telah ditetapkan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menyusun perencanaan proyek dan memastikan proyek berjalan sesuai jadwal.</li>
                    <li>Berkomunikasi dengan stakeholders untuk memahami kebutuhan proyek.</li>
                    <li>Mengelola risiko proyek dan mencari solusi jika terjadi hambatan.</li>
                    <li>Mengawasi sumber daya dan mengalokasikan anggaran dengan optimal.</li>
                    <li>Membantu pengembangan tim dan memberikan feedback secara berkala.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Minimal S1 di bidang Manajemen, Teknik Informatika, atau bidang terkait.</li>
                    <li>Pengalaman minimal 3 tahun sebagai Project Manager.</li>
                    <li>Mampu menggunakan tools manajemen proyek seperti Jira atau Trello.</li>
                    <li>Memiliki sertifikasi PMP atau Agile menjadi nilai tambah.</li>
                    <li>Kemampuan komunikasi dan kepemimpinan yang kuat.</li>
                </ul><br>",
                'salarymin' => 20000000,
                'salarymax' => 40000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'UI/UX Designer',
                'company' => 'Amazon',
                'location' => 'Bali',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Kami mencari UI/UX Designer berbakat yang dapat menciptakan pengalaman pengguna yang menarik dan mudah digunakan untuk platform e-commerce kami.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang wireframe, mockup, dan prototipe dengan Figma atau Adobe XD.</li>
                    <li>Melakukan riset pengguna untuk memahami kebutuhan dan preferensi mereka.</li>
                    <li>Mengembangkan desain yang berfokus pada user experience yang optimal.</li>
                    <li>Bekerja sama dengan tim developer untuk mengimplementasikan desain.</li>
                    <li>Menguji dan meningkatkan desain berdasarkan feedback pengguna.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Gelar Sarjana di bidang Desain Grafis, Desain Interaksi, atau bidang terkait.</li>
                    <li>Pengalaman minimal 2 tahun sebagai UI/UX Designer.</li>
                    <li>Menguasai tools desain seperti Figma, Sketch, atau Adobe XD.</li>
                    <li>Pemahaman tentang prinsip desain responsif dan accessibility.</li>
                    <li>Mampu bekerja dalam tim dan memiliki portofolio desain yang menarik.</li>
                </ul><br>",
                'salarymin' => 10000000,
                'salarymax' => 20000000,
                'type' => 'Part Time',
            ],
            [
                'title' => 'Cybersecurity Analyst',
                'company' => 'IBM',
                'location' => 'Yogyakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Kami sedang mencari seorang Cybersecurity Analyst yang berdedikasi untuk mengamankan sistem dan data perusahaan dari ancaman siber.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Melakukan pemantauan keamanan sistem dan mendeteksi potensi ancaman.</li>
                    <li>Menyelidiki insiden keamanan dan merancang strategi mitigasi.</li>
                    <li>Menganalisis kelemahan sistem dan melakukan penetration testing.</li>
                    <li>Mengembangkan kebijakan dan prosedur keamanan siber.</li>
                    <li>Memberikan pelatihan kepada karyawan terkait praktik keamanan terbaik.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Minimal S1 di bidang Keamanan Siber, Ilmu Komputer, atau bidang terkait.</li>
                    <li>Pengalaman minimal 3 tahun di bidang keamanan siber.</li>
                    <li>Memiliki sertifikasi seperti CEH, CISSP, atau CompTIA Security+ menjadi nilai tambah.</li>
                    <li>Pemahaman mendalam tentang firewall, IDS/IPS, dan enkripsi.</li>
                    <li>Kemampuan analisis dan problem-solving yang kuat.</li>
                </ul><br>",
                'salarymin' => 15000000,
                'salarymax' => 30000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Mobile Developer',
                'company' => 'Spotify',
                'location' => 'Surabaya',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Spotify mencari Mobile Developer yang berpengalaman untuk membangun aplikasi mobile yang stabil dan cepat di iOS dan Android.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Memulai dan mengembangkan aplikasi mobile untuk platform iOS dan Android.</li>
                    <li>Berkoordinasi dengan tim pengembang dan desain untuk memastikan pengalaman pengguna yang luar biasa.</li>
                    <li>Mengidentifikasi dan memperbaiki bug atau masalah performa pada aplikasi.</li>
                    <li>Menulis kode yang bersih, efisien, dan dapat dipelihara.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman pengembangan aplikasi mobile dengan Swift (iOS) atau Kotlin/Java (Android).</li>
                    <li>Pemahaman mendalam tentang arsitektur aplikasi mobile dan SDK terkait.</li>
                    <li>Pengalaman dengan alat pengembangan aplikasi seperti Android Studio atau Xcode.</li>
                </ul><br>",
                'salarymin' => 13000000,
                'salarymax' => 26000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'DevOps Engineer',
                'company' => 'Airbnb',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Airbnb mencari DevOps Engineer untuk mengotomatisasi proses dan meningkatkan integrasi antara pengembangan dan operasi.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Memelihara dan mengelola infrastruktur cloud dan layanan berbasis container seperti Docker dan Kubernetes.</li>
                    <li>Automasi proses build, deployment, dan pengujian aplikasi menggunakan CI/CD pipeline.</li>
                    <li>Mengawasi dan mengoptimalkan kinerja sistem serta memastikan sistem tetap berjalan dengan baik.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dengan Docker, Kubernetes, dan sistem containerisasi lainnya.</li>
                    <li>Pengalaman menggunakan CI/CD tools seperti Jenkins, CircleCI, atau GitLab CI.</li>
                    <li>Pengalaman dengan pengelolaan cloud (AWS, Azure, GCP) dan pengelolaan server.</li>
                </ul><br>",
                'salarymin' => 15000000,
                'salarymax' => 30000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'System Administrator',
                'company' => 'Intel',
                'location' => 'Bandung',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Intel mencari System Administrator untuk memastikan keandalan, kinerja, dan keamanan seluruh sistem dan server.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menjaga dan memelihara sistem operasi, server, dan perangkat keras.</li>
                    <li>Melakukan pemantauan jaringan dan sistem untuk mendeteksi masalah atau gangguan.</li>
                    <li>Memastikan backup data dan pemulihan sistem berjalan dengan baik.</li>
                    <li>Melakukan pengujian dan pembaruan perangkat lunak dan perangkat keras secara rutin.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dalam administrasi sistem Linux dan Windows.</li>
                    <li>Pengalaman dalam pengelolaan server dan jaringan.</li>
                    <li>Memahami konsep virtualisasi dan cloud computing.</li>
                </ul><br>",
                'salarymin' => 12000000,
                'salarymax' => 25000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Graphic Designer',
                'company' => 'TikTok',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Grafik Desainer di TikTok akan bekerja pada berbagai proyek desain visual untuk aplikasi sosial media kami yang sedang berkembang pesat.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang materi visual untuk kampanye pemasaran dan iklan.</li>
                    <li>Berkoordinasi dengan tim kreatif untuk menghasilkan desain yang menarik dan inovatif.</li>
                    <li>Menerjemahkan kebutuhan desain ke dalam gambar atau ilustrasi visual yang sesuai.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dengan Adobe Photoshop, Illustrator, dan InDesign.</li>
                    <li>Portofolio desain yang menunjukkan kreativitas dan keterampilan teknis yang kuat.</li>
                    <li>Kemampuan untuk bekerja secara mandiri serta dalam tim.</li>
                </ul><br>",
                'salarymin' => 10000000,
                'salarymax' => 20000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Cloud Engineer',
                'company' => 'Oracle',
                'location' => 'Bali',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Oracle mencari Cloud Engineer untuk merancang, membangun, dan mengelola infrastruktur cloud yang mendukung berbagai aplikasi dan layanan perusahaan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang dan mengelola infrastruktur cloud yang scalable dan secure.</li>
                    <li>Menangani deployment dan manajemen aplikasi di cloud menggunakan platform seperti AWS, Google Cloud, atau Azure.</li>
                    <li>Berkoordinasi dengan tim pengembang untuk integrasi dan optimasi aplikasi berbasis cloud.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dengan penyedia cloud seperti AWS, GCP, atau Azure.</li>
                    <li>Pengalaman dalam deployment aplikasi cloud dan pengelolaan CI/CD pipeline.</li>
                    <li>Pengetahuan tentang jaringan dan keamanan cloud.</li>
                </ul><br>",
                'salarymin' => 17000000,
                'salarymax' => 35000000,
                'type' => 'Remote',
            ],
            [
                'title' => 'Business Analyst',
                'company' => 'Adobe',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Adobe mencari Business Analyst untuk menganalisis dan mengidentifikasi peluang bisnis baru serta memberikan solusi berbasis data untuk tim manajemen.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menganalisis data dan tren pasar untuk memberikan rekomendasi bisnis yang berbasis data.</li>
                    <li>Membantu tim manajemen dalam pengambilan keputusan berdasarkan analisis data dan riset pasar.</li>
                    <li>Menyusun laporan dan presentasi untuk stakeholders terkait.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dalam analisis bisnis atau bidang terkait.</li>
                    <li>Pengalaman dengan alat analisis data seperti Excel, SQL, atau Tableau.</li>
                    <li>Kemampuan komunikasi yang baik dan kemampuan untuk bekerja dengan berbagai tim.</li>
                </ul><br>",
                'salarymin' => 14000000,
                'salarymax' => 28000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Marketing Manager',
                'company' => 'Unilever',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Unilever mencari Marketing Manager untuk memimpin tim pemasaran dalam merancang dan mengeksekusi strategi pemasaran yang efektif guna meningkatkan brand awareness dan penjualan produk.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang dan mengimplementasikan strategi pemasaran untuk produk baru dan yang sudah ada.</li>
                    <li>Memimpin tim pemasaran dan bekerja sama dengan tim penjualan untuk mencapai target.</li>
                    <li>Menganalisis tren pasar dan kebutuhan pelanggan untuk mengidentifikasi peluang pertumbuhan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 5 tahun di bidang pemasaran, dengan pengalaman manajerial.</li>
                    <li>Memiliki kemampuan analisis pasar yang kuat dan berorientasi pada hasil.</li>
                    <li>Memiliki gelar sarjana di bidang Pemasaran atau Bisnis.</li>
                </ul><br>",
                'salarymin' => 18000000,
                'salarymax' => 35000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Human Resources Officer',
                'company' => 'KPMG',
                'location' => 'Bandung',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>KPMG mencari Human Resources Officer yang bertanggung jawab dalam mengelola berbagai fungsi SDM, termasuk rekrutmen, pengembangan karyawan, dan manajemen kinerja.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Melakukan proses rekrutmen untuk posisi yang dibutuhkan.</li>
                    <li>Mengelola hubungan karyawan dan memberikan dukungan terkait kebijakan perusahaan.</li>
                    <li>Memastikan pelatihan dan pengembangan karyawan sesuai dengan kebutuhan organisasi.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 3 tahun di bidang SDM atau Manajemen Sumber Daya Manusia.</li>
                    <li>Memiliki pemahaman tentang hukum ketenagakerjaan dan kebijakan SDM.</li>
                    <li>Memiliki gelar sarjana di bidang Manajemen SDM atau Psikologi.</li>
                </ul><br>",
                'salarymin' => 14000000,
                'salarymax' => 25000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Customer Service Representative',
                'company' => 'Telkomsel',
                'location' => 'Surabaya',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Telkomsel mencari Customer Service Representative untuk memberikan pelayanan terbaik kepada pelanggan melalui telepon, email, atau live chat.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menangani pertanyaan pelanggan mengenai produk dan layanan perusahaan.</li>
                    <li>Menyelesaikan masalah pelanggan dengan cepat dan efisien.</li>
                    <li>Mencatat dan melaporkan setiap interaksi dengan pelanggan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Memiliki pengalaman di layanan pelanggan atau di industri telekomunikasi.</li>
                    <li>Kemampuan komunikasi yang baik dan mampu bekerja dalam tekanan.</li>
                    <li>Memiliki gelar pendidikan minimal SMA/SMK.</li>
                </ul><br>",
                'salarymin' => 8000000,
                'salarymax' => 16000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Sales Executive',
                'company' => 'Coca Cola',
                'location' => 'Medan',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Coca Cola mencari Sales Executive yang bertanggung jawab dalam mengembangkan dan mempertahankan hubungan dengan pelanggan untuk meningkatkan penjualan produk.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Memperkenalkan produk kepada pelanggan dan menangani proses penjualan.</li>
                    <li>Mencapai target penjualan yang ditetapkan oleh perusahaan.</li>
                    <li>Melakukan riset pasar dan memantau tren industri.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dalam penjualan B2B atau B2C di industri FMCG.</li>
                    <li>Memiliki kemampuan negosiasi dan presentasi yang baik.</li>
                    <li>Memiliki gelar sarjana atau setara.</li>
                </ul><br>",
                'salarymin' => 10000000,
                'salarymax' => 20000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Finance Manager',
                'company' => 'Bank Mandiri',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Bank Mandiri mencari Finance Manager untuk memimpin tim keuangan dalam merencanakan dan mengelola strategi keuangan perusahaan serta memberikan laporan keuangan yang akurat dan tepat waktu.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menyiapkan laporan keuangan bulanan, kuartalan, dan tahunan.</li>
                    <li>Menganalisis data keuangan dan memberikan rekomendasi strategis kepada manajemen.</li>
                    <li>Memastikan kepatuhan terhadap regulasi dan kebijakan keuangan perusahaan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 5 tahun di bidang keuangan, dengan pengalaman manajerial.</li>
                    <li>Memiliki pemahaman yang kuat tentang pengelolaan anggaran dan analisis keuangan.</li>
                    <li>Memiliki gelar sarjana di bidang Keuangan atau Akuntansi.</li>
                </ul><br>",
                'salarymin' => 20000000,
                'salarymax' => 40000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Operations Manager',
                'company' => 'Garuda Indonesia',
                'location' => 'Denpasar',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Garuda Indonesia mencari Operations Manager yang akan bertanggung jawab dalam mengelola operasi harian perusahaan, serta meningkatkan efisiensi dan efektivitas operasional.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Memimpin dan mengelola tim operasional untuk memastikan semua kegiatan operasional berjalan lancar.</li>
                    <li>Menilai dan meningkatkan proses operasional untuk mencapai efisiensi dan kualitas layanan terbaik.</li>
                    <li>Bekerja sama dengan tim lain untuk memecahkan masalah operasional dan memastikan kepuasan pelanggan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 3 tahun dalam manajemen operasional.</li>
                    <li>Memiliki kemampuan analisis, pemecahan masalah, dan pengelolaan tim yang kuat.</li>
                    <li>Memiliki gelar sarjana di bidang Manajemen atau Teknik Industri.</li>
                </ul><br>",
                'salarymin' => 18000000,
                'salarymax' => 35000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Graphic Designer',
                'company' => 'Pixabay',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Pixabay mencari Graphic Designer untuk merancang visual kreatif yang mendukung kampanye pemasaran dan branding perusahaan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Mendesain materi pemasaran seperti banner, poster, dan konten media sosial.</li>
                    <li>Mengembangkan desain grafis yang menarik dan sesuai dengan identitas merek.</li>
                    <li>Bekerja sama dengan tim pemasaran dan pengembang untuk menghasilkan desain yang efektif.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Memiliki pengalaman minimal 2 tahun di bidang desain grafis.</li>
                    <li>Menguasai perangkat desain seperti Adobe Photoshop, Illustrator, dan InDesign.</li>
                    <li>Memiliki portofolio desain yang dapat dipertanggungjawabkan.</li>
                </ul><br>",
                'salarymin' => 10000000,
                'salarymax' => 18000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Content Writer',
                'company' => 'Tokopedia',
                'location' => 'Bandung',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Tokopedia mencari Content Writer yang memiliki kemampuan menulis kreatif dan dapat menghasilkan artikel yang menarik serta relevan untuk audiens.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menulis artikel, blog, dan konten untuk platform digital.</li>
                    <li>Meneliti topik dan menciptakan konten yang sesuai dengan kebutuhan pasar.</li>
                    <li>Bekerja dengan tim SEO untuk memastikan konten yang dihasilkan dapat ditemukan dengan mudah oleh audiens.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 2 tahun di bidang penulisan konten atau copywriting.</li>
                    <li>Memiliki kemampuan menulis yang baik dalam bahasa Indonesia dan Inggris.</li>
                    <li>Memiliki portofolio atau contoh tulisan yang dapat dipertanggungjawabkan.</li>
                </ul><br>",
                'salarymin' => 8000000,
                'salarymax' => 15000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'IT Support Specialist',
                'company' => 'Astra International',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Astra International mencari IT Support Specialist untuk mendukung kebutuhan teknis perusahaan dengan menangani masalah perangkat keras dan perangkat lunak serta memastikan sistem berjalan lancar.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Menyediakan dukungan teknis untuk perangkat keras dan perangkat lunak yang digunakan oleh karyawan.</li>
                    <li>Melakukan pemeliharaan rutin dan memperbaiki masalah teknis yang ada.</li>
                    <li>Memberikan pelatihan kepada karyawan terkait perangkat lunak dan perangkat keras yang digunakan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 2 tahun di bidang dukungan teknis atau IT support.</li>
                    <li>Memahami troubleshooting perangkat keras dan perangkat lunak.</li>
                    <li>Memiliki gelar sarjana di bidang Teknologi Informasi atau terkait.</li>
                </ul><br>",
                'salarymin' => 10000000,
                'salarymax' => 22000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Legal Advisor',
                'company' => 'Sinar Mas',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Sinar Mas mencari Legal Advisor untuk memberikan saran hukum dan memastikan kepatuhan terhadap semua regulasi dan kebijakan perusahaan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Memberikan nasihat hukum mengenai berbagai masalah hukum perusahaan.</li>
                    <li>Menangani kontrak, perjanjian, dan dokumen hukum lainnya.</li>
                    <li>Melakukan riset hukum untuk mendukung pengambilan keputusan bisnis.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Memiliki gelar Sarjana Hukum dan pengalaman minimal 3 tahun di bidang hukum korporasi.</li>
                    <li>Memiliki pemahaman yang baik tentang hukum bisnis dan regulasi pemerintah.</li>
                    <li>Memiliki lisensi sebagai advokat atau pengacara merupakan nilai tambah.</li>
                </ul><br>",
                'salarymin' => 25000000,
                'salarymax' => 45000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Social Media Specialist',
                'company' => 'Mediakarya',
                'location' => 'Yogyakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Mediakarya mencari Social Media Specialist yang memiliki kemampuan untuk mengelola dan mengembangkan kampanye media sosial perusahaan untuk meningkatkan engagement dan brand awareness.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang dan menjalankan strategi konten media sosial untuk perusahaan.</li>
                    <li>Menangani semua interaksi di platform media sosial dan membangun komunitas online.</li>
                    <li>Melakukan analisis dan melaporkan kinerja kampanye media sosial.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Memiliki pengalaman minimal 2 tahun di bidang manajemen media sosial atau pemasaran digital.</li>
                    <li>Memiliki pengetahuan yang baik tentang platform media sosial seperti Instagram, Facebook, Twitter, dan LinkedIn.</li>
                    <li>Memiliki keterampilan komunikasi dan penulisan yang baik.</li>
                </ul><br>",
                'salarymin' => 8000000,
                'salarymax' => 16000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Product Manager',
                'company' => 'Gojek',
                'location' => 'Bandung',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Gojek mencari Product Manager untuk merancang dan mengembangkan produk yang memenuhi kebutuhan pelanggan dan mendukung strategi bisnis perusahaan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang dan mengelola roadmap produk untuk mencapai tujuan bisnis perusahaan.</li>
                    <li>Berkoordinasi dengan tim pengembangan untuk memastikan produk dikembangkan dengan baik.</li>
                    <li>Melakukan riset pasar untuk memahami kebutuhan pelanggan dan tren industri.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 3 tahun di bidang manajemen produk atau pengembangan produk.</li>
                    <li>Memiliki keterampilan analitis yang kuat dan mampu membuat keputusan berbasis data.</li>
                    <li>Memiliki gelar sarjana di bidang Teknik, Bisnis, atau bidang terkait.</li>
                </ul><br>",
                'salarymin' => 20000000,
                'salarymax' => 40000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Event Coordinator',
                'company' => 'Indo Event',
                'location' => 'Surabaya',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Indo Event mencari Event Coordinator untuk merencanakan, mengorganisir, dan mengawasi berbagai acara perusahaan, mulai dari seminar hingga konferensi besar.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Mengelola logistik acara dan memastikan semua berjalan lancar pada hari-H.</li>
                    <li>Berkoordinasi dengan vendor, lokasi, dan tim internal untuk memastikan semua kebutuhan acara terpenuhi.</li>
                    <li>Mengawasi anggaran dan waktu untuk memastikan acara sesuai dengan perencanaan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman minimal 2 tahun dalam perencanaan acara atau manajemen proyek.</li>
                    <li>Memiliki keterampilan organisasi dan manajemen waktu yang baik.</li>
                    <li>Memiliki gelar di bidang Manajemen Acara atau terkait.</li>
                </ul><br>",
                'salarymin' => 12000000,
                'salarymax' => 22000000,
                'type' => 'Full Time',
            ],                        
            [
                'title' => 'Quality Assurance Engineer',
                'company' => 'Slack',
                'location' => 'Bali',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Slack mencari Quality Assurance Engineer untuk memastikan bahwa produk kami memiliki kualitas terbaik dengan melakukan pengujian yang mendalam pada aplikasi dan platform kami.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Melakukan pengujian manual dan otomatis pada perangkat lunak dan aplikasi.</li>
                    <li>Menulis dan menjalankan skrip pengujian untuk memastikan aplikasi berjalan sesuai spesifikasi.</li>
                    <li>Melaporkan bug dan bekerja sama dengan tim pengembang untuk menyelesaikan masalah yang ditemukan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman di bidang QA dengan pengetahuan dalam pengujian perangkat lunak.</li>
                    <li>Pengalaman dengan alat pengujian otomatis seperti Selenium atau JUnit.</li>
                    <li>Pemahaman yang kuat tentang siklus hidup perangkat lunak dan pengujian perangkat lunak.</li>
                </ul><br>",
                'salarymin' => 13000000,
                'salarymax' => 26000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Network Engineer',
                'company' => 'Cisco',
                'location' => 'Yogyakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Cisco sedang mencari Network Engineer untuk merancang, mengimplementasikan, dan memelihara jaringan yang andal dan aman untuk perusahaan dan klien kami.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang dan mengelola jaringan komputer yang skalabel dan aman.</li>
                    <li>Melakukan pemantauan dan pemecahan masalah pada infrastruktur jaringan.</li>
                    <li>Berkoordinasi dengan tim lain untuk memastikan performa jaringan yang optimal.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dengan perangkat keras dan perangkat lunak jaringan, serta protokol jaringan seperti TCP/IP, DNS, dan HTTP.</li>
                    <li>Pengalaman dengan pengelolaan perangkat jaringan seperti router, switch, dan firewall.</li>
                    <li>Memiliki sertifikasi CCNA atau setara akan menjadi nilai tambah.</li>
                </ul><br>",
                'salarymin' => 13000000,
                'salarymax' => 26000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Data Scientist',
                'company' => 'Uber',
                'location' => 'Surabaya',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Uber mencari Data Scientist untuk menganalisis data besar dan mengembangkan model prediktif yang membantu perusahaan dalam pengambilan keputusan yang berbasis data.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Melakukan analisis data besar menggunakan Python, R, atau alat terkait.</li>
                    <li>Membangun model prediktif dan machine learning untuk meningkatkan pengalaman pengguna.</li>
                    <li>Bekerja dengan tim produk dan engineering untuk mengembangkan solusi berbasis data.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dalam analisis data besar, machine learning, dan algoritma statistik.</li>
                    <li>Pengalaman dengan Python, SQL, atau R untuk analisis data dan pembuatan model.</li>
                    <li>Pengalaman dengan alat analisis data seperti Hadoop atau Spark.</li>
                </ul><br>",
                'salarymin' => 17000000,
                'salarymax' => 35000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Cloud Solutions Architect',
                'company' => 'Microsoft Azure',
                'location' => 'Bali',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Microsoft Azure mencari Cloud Solutions Architect untuk merancang solusi berbasis cloud yang inovatif dan mendukung pertumbuhan digital perusahaan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang dan membangun solusi cloud untuk perusahaan dan klien dengan menggunakan Microsoft Azure.</li>
                    <li>Berkoordinasi dengan tim pengembang dan operasi untuk memastikan implementasi solusi berjalan lancar.</li>
                    <li>Mengidentifikasi dan mengatasi masalah kinerja dan skalabilitas pada aplikasi cloud.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dengan platform cloud, terutama Microsoft Azure.</li>
                    <li>Pengalaman dalam merancang dan mengimplementasikan solusi cloud skala besar.</li>
                    <li>Memiliki sertifikasi Microsoft Azure atau cloud computing lainnya akan menjadi nilai tambah.</li>
                </ul><br>",
                'salarymin' => 18000000,
                'salarymax' => 40000000,
                'type' => 'Remote',
            ],
            [
                'title' => 'Technical Support Engineer',
                'company' => 'Dell Technologies',
                'location' => 'Bandung',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Dell Technologies mencari Technical Support Engineer untuk memberikan dukungan teknis yang luar biasa kepada klien dan memastikan masalah mereka diselesaikan dengan cepat dan efisien.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Memberikan dukungan teknis kepada klien melalui telepon, email, atau chat.</li>
                    <li>Menangani masalah terkait perangkat keras, perangkat lunak, dan jaringan.</li>
                    <li>Memecahkan masalah teknis dan memberikan solusi yang tepat waktu.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dalam memberikan dukungan teknis di bidang perangkat keras dan perangkat lunak.</li>
                    <li>Pengetahuan tentang sistem operasi seperti Windows, Linux, atau macOS.</li>
                    <li>Kemampuan komunikasi yang sangat baik dan kemampuan pemecahan masalah yang kuat.</li>
                </ul><br>",
                'salarymin' => 11000000,
                'salarymax' => 22000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'IT Support Specialist',
                'company' => 'HP Inc.',
                'location' => 'Jakarta',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>HP Inc. mencari IT Support Specialist untuk mendukung infrastruktur IT internal serta memberikan solusi terhadap masalah teknis yang timbul di perusahaan.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Mendukung instalasi, konfigurasi, dan pemeliharaan perangkat keras dan perangkat lunak perusahaan.</li>
                    <li>Melakukan pemecahan masalah terkait sistem dan perangkat IT yang digunakan oleh karyawan.</li>
                    <li>Memberikan pelatihan dasar tentang teknologi baru kepada karyawan.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman di bidang dukungan IT atau administrasi sistem.</li>
                    <li>Pengetahuan tentang perangkat keras, jaringan, dan perangkat lunak operasional.</li>
                    <li>Memiliki sertifikasi seperti CompTIA A+ atau setara akan menjadi nilai tambah.</li>
                </ul><br>",
                'salarymin' => 10000000,
                'salarymax' => 21000000,
                'type' => 'Full Time',
            ],
            [
                'title' => 'Software Architect',
                'company' => 'Oracle',
                'location' => 'Surabaya',
                'description' => "<h3>Tentang Pekerjaan:</h3>
                <p>Oracle mencari Software Architect yang berpengalaman untuk merancang arsitektur perangkat lunak yang scalable dan mendukung kebutuhan bisnis yang berkembang.</p><br>
                <h3>Tanggung Jawab:</h3>
                <ul>
                    <li>Merancang arsitektur perangkat lunak untuk aplikasi berbasis cloud dan on-premises.</li>
                    <li>Berkoordinasi dengan tim pengembang untuk memastikan implementasi desain arsitektur.</li>
                    <li>Mengevaluasi dan memitigasi risiko teknis dalam proyek pengembangan perangkat lunak.</li>
                </ul><br>
                <h3>Kualifikasi:</h3>
                <ul>
                    <li>Pengalaman dalam desain arsitektur perangkat lunak dan pengelolaan proyek pengembangan perangkat lunak besar.</li>
                    <li>Pengalaman dengan teknologi cloud dan arsitektur microservices.</li>
                    <li>Memiliki gelar sarjana di bidang Ilmu Komputer atau Rekayasa Perangkat Lunak, atau setara.</li>
                </ul><br>",
                'salarymin' => 20000000,
                'salarymax' => 42000000,
                'type' => 'Full Time',
            ],                        
        ];
    
        $job = fake()->randomElement($jobs);
    
        return [
            'title' => $job['title'],
            'company' => $job['company'],
            'location' => $job['location'],
            'description' => $job['description'],
            'salarymin' => $job['salarymin'],
            'salarymax' => $job['salarymax'],
            'type' => $job['type'],
            'status' => 'approve',
            'id_user' => User::where('role', 'hire')->inRandomOrder()->first()->id        
        ];
     }
          
}
