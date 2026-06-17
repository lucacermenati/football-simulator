import ArrowLeft from "@/Icons/ArrowLeft";
import ArrowRight from "@/Icons/ArrowRight";
import { Link } from "@inertiajs/react";
import clsx from "clsx";

export default function Pagination({ links, meta }) {
    return (
        <div className="flex justify-center mt-6">
            <div className="inline-flex gap-2 justify-center p-2 bg-white rounded">
                <Link href={links.prev || "#"}>
                    <ArrowLeft
                        className={clsx(
                            "w-6 h-6",
                            links.prev
                                ? "cursor-pointer text-primaryRed-600"
                                : "cursor-auto text-lightGrey-600",
                        )}
                    />
                </Link>
                {meta.links.slice(1, -1).map((link) => (
                    <Link key={link.label} href={link?.url || "#"}>
                        <div
                            className={clsx(
                                "flex justify-center items-center w-6 h-6 rounded-full border border-primaryRed-600",
                                link.active
                                    ? " bg-primaryRed-600 text-white"
                                    : "bg-white text-primaryRed-600",
                            )}
                        >
                            {link.label}
                        </div>
                    </Link>
                ))}
                <Link href={links.next || "#"}>
                    <ArrowRight
                        className={clsx(
                            "w-6 h-6",
                            links.next
                                ? "cursor-pointer text-primaryRed-600"
                                : "cursor-auto text-lightGrey-600",
                        )}
                    />
                </Link>
            </div>
        </div>
    );
}
