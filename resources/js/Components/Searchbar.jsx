import TextInput from "@/Components/TextInput";
import { router } from "@inertiajs/react";

export default function Searchbar({
    routeName,
    query,
    placeholder = "Search...",
}) {
    return (
        <TextInput
            onChange={(e) => {
                router.get(
                    route(routeName, query),
                    {
                        search: e.target.value,
                    },
                    {
                        preserveState: true,
                        preserveScroll: true,
                    },
                );
            }}
            className="w-64"
            placeholder={placeholder}
        />
    );
}
