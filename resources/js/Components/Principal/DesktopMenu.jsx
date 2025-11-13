import { useState } from "react";
import { motion, AnimatePresence } from "framer-motion";
import { Link } from "@inertiajs/react";

export default function DesktopMenu({ menuItems }) {
  const [activeItem, setActiveItem] = useState(null);

  return (
    <ul className="hidden lg:flex space-x-14 text-sm font-semibold text-gray-700">
      {menuItems.map((item) => (
        <li
          key={item.name}
          className="relative"
          onMouseEnter={() => setActiveItem(item.name)}
          onMouseLeave={() => setActiveItem(null)}
        >
          <Link
            href={item.link}
            method={item.method || "get"} // 👈 soporte para POST/GET
            as={item.as || "a"} // 👈 si es "button" o "a"
            className="relative text-lg flex items-center py-2 text-gray-700 transition-colors duration-300 hover:text-blue-600"
          >
            {item.name}

            {/* Línea animada debajo del texto */}
            <span className="absolute bottom-0 left-0 w-0 h-[2px] bg-gradient-to-r from-blue-400 to-blue-600 transition-all duration-300 group-hover:w-full"></span>
          </Link>

          {/* Submenú animado */}
          <AnimatePresence>
            {item.submenu && activeItem === item.name && (
              <motion.div
                initial={{ opacity: 0, scaleY: 0.7, y: -10 }}
                animate={{ opacity: 1, scaleY: 1, y: 0 }}
                exit={{ opacity: 0, scaleY: 0.7, y: -10 }}
                transition={{ duration: 0.25, ease: "easeOut" }}
                className="absolute left-0 top-full pt-2 origin-top z-50"
              >
                <ul className="rounded-2xl border border-blue-100 bg-white/95 backdrop-blur-sm shadow-xl ring-1 ring-blue-50 min-w-[190px] overflow-hidden">
                  {item.submenu.map((sub) => (
                    <li key={sub.name}>
                      {/* 👇 Aquí corregimos para soportar logout con POST */}
                      {sub.method === "post" ? (
                        <Link
                          href={sub.link}
                          method="post"
                          as="button"
                          className={
                            sub.className ||
                            "block w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition-all duration-200"
                          }
                        >
                          {sub.name}
                        </Link>
                      ) : (
                        <Link
                          href={sub.link}
                          className={
                            sub.className ||
                            "block px-4 py-2 text-sm text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition-all duration-200"
                          }
                        >
                          {sub.name}
                        </Link>
                      )}
                    </li>
                  ))}
                </ul>
              </motion.div>
            )}
          </AnimatePresence>
        </li>
      ))}
    </ul>
  );
}
