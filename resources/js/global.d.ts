import AlpineInstance from "@types/alpinejs";

declare global {
    interface Window {
        Alpine: AlpineInstance;
    }
}
