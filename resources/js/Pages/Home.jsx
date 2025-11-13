import Header from '@/Components/Principal/Header';
import { Head, Link } from '@inertiajs/react';

export default function Home({}) {
    return (
        <>
            <Head title="Inicio-carrito-compras" />
            <Header />
            <main className="min-h-screen flex flex-col items-center justify-center bg-gray-50 text-gray-800">
                <h1 className="text-4xl font-bold mb-4">Bienvenido a mi tienda 🛍️</h1>
                <p className="text-lg text-gray-600">Explora nuestros productos y disfruta comprando fácilmente.</p>
            </main>
        </>
    );
}
