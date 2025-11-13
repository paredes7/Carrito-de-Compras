import { motion } from "framer-motion";

export default function HamburgerButton({ isOpen, toggle }) {
  return (
    <motion.button
      onClick={toggle}
      aria-label="Toggle menu"
      whileHover={{ scale: 1.1 }}
      whileTap={{ scale: 0.95 }}
      className="flex md:flex lg:hidden flex-col justify-center items-center w-10 h-10 focus:outline-none relative z-50"
    >
      {/**Barras del botón (las tres líneas) */}
      <motion.span
        animate={{ rotate: isOpen ? 45 : 0, y: isOpen ? 6 : 0 }}
        transition={{ type: "spring", stiffness: 300, damping: 20 }}
        className={`absolute mb-3 w-6 h-0.5 rounded transition-colors ${
          isOpen ? "bg-blue-600" : "bg-blue-800"
        }`}
      />
      <motion.span
        animate={{ opacity: isOpen ? 0 : 1 }}
        transition={{ duration: 0.2 }}
        className={`absolute w-6 h-0.5 rounded transition-colors ${
          isOpen ? "bg-blue-600" : "bg-blue-800"
        }`}
      />
      <motion.span
        animate={{ rotate: isOpen ? -45 : 0, y: isOpen ? -6 : 0 }}
        transition={{ type: "spring", stiffness: 300, damping: 20 }}
        className={`absolute mt-3 w-6 h-0.5 rounded transition-colors ${
          isOpen ? "bg-blue-600" : "bg-blue-800"
        }`}
      />
    </motion.button>
  );
}
